//Failed authorization sound

// Отримання посилання на кнопку та аудіоелемент
let authButtons = document.querySelectorAll('.failedSnd');
let audio = new Audio('./src/snd/sad_trombone.mp3');

// Додавання обробника подій для кнопок
authButtons.forEach((authButton) => {
  authButton.addEventListener('click', () => {
    // Відтворення аудіо
    audio.play();
  });
});

//WEATHER API
fetch(
  'http://api.openweathermap.org/data/2.5/weather?q=Kyiv&appid=e09cd95b418f6d73f0dc4adb3006df2e'
)
  .then(function (resp) {
    return resp.json();
  })
  .then(function (data) {
    console.log(data);
    document.querySelector('.city').textContent = data.name;
    document.querySelector('.temp').innerHTML =
      Math.round(data.main.temp - 273) + '&deg;' + 'C';

    document.querySelector(
      '.icony'
    ).innerHTML = `<img src="https://openweathermap.org/img/wn/${data.weather[0]['icon']}@2x.png">`;
  });
