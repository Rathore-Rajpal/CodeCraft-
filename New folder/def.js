// Function to load codes
function loadCodes(filename) {
    // Send AJAX request to load codes
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "save_load.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let response = JSON.parse(xhr.responseText);
            document.getElementById("html-code").value = response.htmlCode;
            document.getElementById("css-code").value = response.cssCode;
            document.getElementById("java-code").value = response.jsCode;
            run(); // Run the code after loading
        }
    };
    xhr.send("action=load&filename=" + filename);
}

// Event listener for form submission
document.querySelector("form").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent default form submission

    let action = event.submitter.value; // Get the value of the clicked button (save or load)
    let filename = document.getElementById("filename").value;

    if (action === "save") {
        let htmlCode = document.getElementById("html-code").value;
        let cssCode = document.getElementById("css-code").value;
        let jsCode = document.getElementById("java-code").value;

        // Send AJAX request to save codes
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "save_load.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                alert(xhr.responseText);
            }
        };
        xhr.send("action=save&filename=" + filename + "&html-code=" + encodeURIComponent(htmlCode) + "&css-code=" + encodeURIComponent(cssCode) + "&java-code=" + encodeURIComponent(jsCode));
    } else if (action === "load") {
        loadCodes(filename);
    }
});
