export function initCheckOpenLogin() {
  function checkOpenLogin() {
    const url = window.location.href;
    if (url.indexOf("#open-login") !== -1) {
      document.getElementById('nw-loginbox').classList.remove("nw-hidden");
    }
  }
}