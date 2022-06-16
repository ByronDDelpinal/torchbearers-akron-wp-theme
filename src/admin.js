
function setDefaultVirtualEventSettings() {
    // Set button text to "Join Zoom Link"
    document.querySelector("#tribe-events-virtual-virtual-button-text").value = "Join Zoom Link";
    document.querySelector("#tribe-events-virtual-virtual-button-text").readonly = true;
    document.querySelector("#tribe-events-virtual-virtual-button-text").onclick = "return false;"

    // Set "Embed Video" checkbox to false
    document.querySelector("#tribe-events-virtual-embed-video").checked = false;
}

document.querySelector("button.tribe-configure-virtual-button.button").addEventListener("click", setDefaultVirtualEventSettings);
