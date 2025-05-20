document.addEventListener("DOMContentLoaded", function () {
    // Select the blog content container (modify if needed)
    let blogContent = document.querySelector(".blog-content");

    if (blogContent) {
        // Add the wrapper class "rfzdigital-uk-blog-details" if not already present
        if (!blogContent.classList.contains("rfzdigital-uk-blog-details")) {
            let wrapper = document.createElement("div");
            wrapper.classList.add("rfzdigital-uk-blog-details");
            blogContent.parentNode.insertBefore(wrapper, blogContent);
            wrapper.appendChild(blogContent);
        }

        // Select all heading tags
        let headings = blogContent.querySelectorAll("h1, h2, h3, h4, h5, h6");
        let h2Count = 0; // Counter for h2 elements

        headings.forEach((heading) => {
            let tagName = heading.tagName.toLowerCase(); // Get tag name in lowercase

            if (tagName === "h2") {
                h2Count++; // Increment h2 counter
                heading.classList.add(`rfz-blog-heading-${tagName}-${h2Count}`); // Unique class for h2
            } else {
                heading.classList.add(`rfz-blog-heading-${tagName}`); // Generic class for others
            }
        });
    }
});


// document.addEventListener("DOMContentLoaded", function () {
//     let listItems = document.querySelectorAll("ol li");

//     listItems.forEach((li) => {
//         let textNodes = Array.from(li.childNodes).filter(node => node.nodeType === Node.TEXT_NODE && node.nodeValue.trim() !== "");
        
//         if (textNodes.length > 0) {
//             let firstTextNode = textNodes[0]; // Get the first text node
//             let h4Tag = document.createElement("h4"); // Create <h4> element
//             h4Tag.textContent = firstTextNode.nodeValue.trim(); // Set text inside <h4>

//             li.insertBefore(h4Tag, firstTextNode); // Insert <h4> before the text node
//             firstTextNode.remove(); // Remove old text node
//         }
//     });
// });

document.addEventListener("DOMContentLoaded", function () {
    let listItems = document.querySelectorAll("ol li");

    listItems.forEach((li) => {
        // Wrap the first text node in <h4>
        let textNodes = Array.from(li.childNodes).filter(node => node.nodeType === Node.TEXT_NODE && node.nodeValue.trim() !== "");

        if (textNodes.length > 0) {
            let firstTextNode = textNodes[0]; 
            let h4Tag = document.createElement("h4"); 
            
            // Insert the first text node content into <h4>
            h4Tag.textContent = firstTextNode.nodeValue.trim(); 

            li.insertBefore(h4Tag, firstTextNode); 
            firstTextNode.remove(); 
        }

        // Now process <b> tags to add a class and push them to a new line
        let boldTags = li.querySelectorAll("b");
        boldTags.forEach((bTag) => {
            bTag.classList.add("new-line-bold"); 
        });
    });
});





