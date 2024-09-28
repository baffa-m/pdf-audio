var synth = window.speechSynthesis;
var inputTxt = document.querySelector('.txt');
var readBtn = document.getElementById('readBtn');
var voiceSelect = document.querySelector('select');
var pitch = document.querySelector('#pitch');
var pitchValue = document.querySelector('.pitch-value');
var rate = document.querySelector('#rate');
var rateValue = document.querySelector('.rate-value');
var voices = [];
var utterThis; // declare the SpeechSynthesisUtterance globally
var isSpeaking = false; // to track if speech is currently happening
var isPaused = false; // to track if speech is paused
var pauseBtn = document.getElementById('pauseBtn');
var resumeBtn = document.getElementById('resumeBtn');

// Populate voice list
function populateVoiceList() {
  voices = synth.getVoices();
  var selectedIndex = voiceSelect.selectedIndex < 0 ? 0 : voiceSelect.selectedIndex;
  voiceSelect.innerHTML = '';
  for (i = 0; i < voices.length; i++) {
    var option = document.createElement('option');
    option.textContent = voices[i].name + ' (' + voices[i].lang + ')';
    if (voices[i].default) {
      option.textContent += ' -- DEFAULT';
    }
    option.setAttribute('data-lang', voices[i].lang);
    option.setAttribute('data-name', voices[i].name);
    voiceSelect.appendChild(option);
  }
  voiceSelect.selectedIndex = selectedIndex;
}

populateVoiceList();
if (speechSynthesis.onvoiceschanged !== undefined) {
  speechSynthesis.onvoiceschanged = populateVoiceList;
}

readBtn.onclick = function (event) {
  event.preventDefault();
  speak(inputTxt.value);
};

function speak(text) {
  if (synth.speaking && !synth.paused) {
    synth.cancel(); // Stop any ongoing speech before starting a new one
  }

  utterThis = new SpeechSynthesisUtterance(text); // Create new speech instance
  utterThis.pitch = pitch.value;
  utterThis.rate = rate.value;
  var selectedOption = voiceSelect.selectedOptions[0].getAttribute('data-name');
  
  for (i = 0; i < voices.length; i++) {
    if (voices[i].name === selectedOption) {
      utterThis.voice = voices[i];
    }
  }
  
  utterThis.onend = function () {
    isSpeaking = false;
    isPaused = false;
  };

  utterThis.onerror = function () {
    isSpeaking = false;
    isPaused = false;
  };

  synth.speak(utterThis);
  isSpeaking = true;
  isPaused = false; // Reset the pause state
}

// Real-time pitch adjustment
pitch.oninput = function () {
  pitchValue.textContent = pitch.value;
  if (isSpeaking && !isPaused) {
    synth.cancel(); // Cancel current speech to apply changes
    speak(inputTxt.value); // Restart the speech with new pitch value
  }
};

// Real-time rate adjustment
rate.oninput = function () {
  rateValue.textContent = rate.value;
  if (isSpeaking && !isPaused) {
    synth.cancel(); // Cancel current speech to apply changes
    speak(inputTxt.value); // Restart the speech with new rate value
  }
};

// Real-time voice change
voiceSelect.onchange = function () {
  if (isSpeaking && !isPaused) {
    synth.cancel(); // Cancel current speech to apply the new voice
    speak(inputTxt.value); // Restart the speech with new voice
  }
};

// Pause speech
pauseBtn.onclick = function () {
  alert('we here')
  if (synth.speaking && !synth.paused) {
    synth.pause();
    isPaused = true; // Set pause state to true
  }
};

// Resume speech
resumeBtn.onclick = function () {
  alert('resume')
  if (synth.paused) {
    synth.resume();
    isPaused = false; // Reset pause state when resuming
  }
};
