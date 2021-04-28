require("./bootstrap");

Echo.private("notifications").listen("UserSessionChanged", (e) => {
  const notificationElement = document.getElementById("notificacion");

  notificationElement.innerText = e.message;

  notificationElement.classList.remove("invisible");
  notificationElement.classList.remove("alert-danger");
  notificationElement.classList.remove("alert-success");

  notificationElement.classList.add("alert-" + e.messageType);
});
