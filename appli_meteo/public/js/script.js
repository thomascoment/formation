document.querySelector('select').addEventListener('change', (e) => {
    let city = e.target.value;
    fetchWeather(city);
});

// Sert à détecter quand l'utilisateur selectionne une autre ville

function fetchWeather(city) {
    let url = "https://www.prevision-meteo.ch/services/json/" + city;

    fetch(url)
    .then(response => response.json())
    .then(data => {
        displayWeather(data);
    })

    .catch(error => {
        console.error("Erreur lors de la récupération des données météo : ", error);
    });
}

// Sert à récupérer l'API et afficher un msg d'erreur si les données se chargent mal


function displayWeather(json) {
json.fcst_day_0 // aujourd'hui
json.fcst_day_1 // demain
json.fcst_day_2 // après-demain
}

// créer les cartes météo


function displayWeather(json) {
    const weatherContainer = document.getElementById("weather-container");
    weatherContainer.innerHTML = ""; //Vider le précédent contenu

    for (let i = 0; i <3; i++) {
        let day = json[`fcst_day_${i}`];

        let card = document.createElement("div");
        card.classList.add("weather-card");

        card.innerHTML = `
        <p><strong>${day.day_long}</strong></p>
        <p>Température min : ${day.tmin}°C</p>
        <p>Température max : ${day.tmax}°C</p>
        <p>Conditions : ${day.condition}</p>
        <img src="${day.icon}" alt="Icône météo">
        `;

        weatherContainer.appendChild(card);

    }
    console.log(json)
}


window.addEventListener('DOMContentLoaded', () => {
    fetchWeather("bordeaux");
});