
const showContactBtn = document.getElementById("show-contact");


showContactBtn.addEventListener("click", () => {
    let contactInfo = document.getElementById("contact-info");
    contactInfo.classList.toggle("opend");
    if (contactInfo.classList.contains("opend")) {
        showContactBtn.textContent = '';
        showContactBtn.textContent = "Show Content"
    } else {
        showContactBtn.textContent = '';
        showContactBtn.textContent = "Hide Content"
    }
});

// Start Show And Hide Section
let nameSectionsBtns = document.querySelectorAll(".name-section");
nameSectionsBtns.forEach(btnSection => {
    btnSection.addEventListener("click", () => {
        // Set Active class in li btn
        nameSectionsBtns.forEach(btn => btn.classList.remove("active"));
        btnSection.classList.add("active")
        
        
        let name = btnSection.getAttribute("to");
        
        let sections = document.querySelectorAll('[sub-section]');

        sections.forEach(section => {
            section.classList.remove("active");
            if (section.getAttribute("page") === name) {
                section.classList.add("active");
            }
        });
    });
});
// End Show And Hide Section

// Disabled messages button
let disableds = document.querySelectorAll("[disabled]");
disableds.forEach(disabled => { disabled.setAttribute("disabled", '') });

const btnSendMessage = document.getElementById("send-message");

