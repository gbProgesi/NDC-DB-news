<?php
// Required WordPress files to use WordPress functions
require_once('wp-load.php');

// Function to get content from URL
function getPageContent($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $content = curl_exec($ch);
    
    if(curl_errno($ch)) {
        echo 'Error: ' . curl_error($ch);
        return false;
    }
    
    curl_close($ch);
    return $content;
}

// Function to parse content using DOMDocument
function parseContent($html) {
    $dom = new DOMDocument();
    @$dom->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    $xpath = new DOMXPath($dom);
    
    // Adjust these XPath queries based on your target webpage structure
    $title = $xpath->query('//h1')->item(0)->textContent ?? '';
    $content = $xpath->query('//div[@class="main-content"]')->item(0)->textContent ?? '';
    
    return [
        'title' => trim($title),
        'content' => trim($content)
    ];
}

// Function to create WordPress post
function createWordPressPost($title, $content, $status = 'draft') {
    // Create post array
    $post_data = array(
        'post_title'    => wp_strip_all_tags($title),
        'post_content'  => $content,
        'post_status'   => $status,
        'post_author'   => 1,  // Default admin user ID
        'post_type'     => 'post'
    );
    
    // Insert the post into the database
    $post_id = wp_insert_post($post_data);
    
    if(!is_wp_error($post_id)) {
        return $post_id;
    } else {
        return false;
    }
}

// Main execution
try {
    // Configuration
    $target_url = 'https://example.com/your-php-page.php'; // Replace with your target URL
    
    // Get page content
    $html_content = getPageContent($target_url);
    if(!$html_content) {
        throw new Exception("Failed to fetch content from URL");
    }
    
    // Parse content
    $parsed_content = parseContent($html_content);
    if(empty($parsed_content['title']) || empty($parsed_content['content'])) {
        throw new Exception("Failed to parse content");
    }
    
    // Create WordPress post
    $post_id = createWordPressPost(
        $parsed_content['title'],
        $parsed_content['content'],
        'draft'  // Set to 'publish' for immediate publication
    );
    
    if($post_id) {
        echo "Success! Post created with ID: " . $post_id;
        echo "\nTitle: " . $parsed_content['title'];
    } else {
        throw new Exception("Failed to create WordPress post");
    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
