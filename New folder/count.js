 function countCharacters() {
            let htmlCode = document.getElementById("html-code").value;
            let cssCode = document.getElementById("css-code").value;
            let jsCode = document.getElementById("java-code").value;

            // Calculate total characters
            let totalCharacters = htmlCode.length + cssCode.length + jsCode.length -2;

            // Display total characters count
            document.getElementById("charCount").textContent = "Total Characters Typed: " + totalCharacters;
        }

        // Call countCharacters function whenever there's a keyup event in any of the text areas
        document.getElementById("html-code").addEventListener("keyup", countCharacters);
        document.getElementById("css-code").addEventListener("keyup", countCharacters);
        document.getElementById("java-code").addEventListener("keyup", countCharacters);