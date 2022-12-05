const donateamountButton = document.getElementById('donateamount');
const donatefoodButton = document.getElementById('donatefood');
const container = document.getElementById('container');

donateamountButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

donatefoodButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});