var popupclick = document.getElementById("chat-popup");

if(popupclick) {
	popupclick.addEventListener("click", chat_popup_function);
}	else console.log("null");

function chat_popup_function() {
	var popup = document.getElementById("chat-popup");
	popup.classList.toggle("hide");
}