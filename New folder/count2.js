// Function to download code
function downloadText(areaId) {
    let content = document.getElementById(areaId).value;
    let blob = new Blob([content], { type: "text/plain" });
    let url = URL.createObjectURL(blob);
    let a = document.createElement('a');
    a.href = url;
    a.download = areaId + ".txt";
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    URL.revokeObjectURL(url);
}