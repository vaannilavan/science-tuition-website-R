var typed = new Typed('.text', {
    strings: [ 'IT','Mathematics', 'Physics', 'Chemistry', 'Biology'],
    typeSpeed: 50,
    backSpeed: 10,
    loop: true
});


//Dynamic content
document.addEventListener("DOMContentLoaded", function() {
    loadServices();
    loadTestimonials();
});

function loadServices() {
    //Simulated data
    const servicesData = [
        { name: "Mathematics Classes", description: "Learn advanced math concepts from our expert tutors." },
        { name: "Science Classes", description: "Explore the wonders of science through our interactive classes." },
    ];

    const servicesContainer = document.querySelector(".services-container");

    servicesData.forEach(service => {
        const serviceCard = document.createElement("div");
        serviceCard.classList.add("service-card");
        serviceCard.innerHTML = `
            <h3>${service.name}</h3>
            <p>${service.description}</p>
        `;
        servicesContainer.appendChild(serviceCard);
    });
}

function loadTestimonials() {
    //Simulated data
    const testimonialsData = [
        { name: "Vaannilavan", message: "Online Classes helped me improve my grades significantly!" },
        { name: "Pathmathas", message: "The tutors are very knowledgeable and supportive." },
    ];

    const testimonialContainer = document.querySelector(".testimonial-container");

    testimonialsData.forEach(testimonial => {
        const testimonialCard = document.createElement("div");
        testimonialCard.classList.add("testimonial-card");
        testimonialCard.innerHTML = `
            <p>${testimonial.message}</p>
            <p><strong>${testimonial.name}</strong></p>
        `;
        testimonialContainer.appendChild(testimonialCard);
    });
}











//Toggle
document.addEventListener("DOMContentLoaded", function() {
    const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
    const currentTheme = localStorage.getItem('theme');

    if (currentTheme) {
        document.documentElement.setAttribute('data-theme', currentTheme);

        if (currentTheme === 'dark') {
            toggleSwitch.checked = true;
        }
    }

    function switchTheme(e) {
        if (e.target.checked) {
            document.documentElement.setAttribute('data-theme', 'dark');
            localStorage.setItem('theme', 'dark');
        } else {
            document.documentElement.setAttribute('data-theme', 'light');
            localStorage.setItem('theme', 'light');
        }
    }

    toggleSwitch.addEventListener('change', switchTheme, false);
});
