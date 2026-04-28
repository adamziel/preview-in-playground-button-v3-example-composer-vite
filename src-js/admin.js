// Trivial JS to prove the Vite build ran and the bundle is enqueued.
const start = Date.now();
function tick() {
    const el = document.getElementById('playground-demo-count');
    if (el) el.textContent = String(Math.floor((Date.now() - start) / 1000));
    requestAnimationFrame(tick);
}
document.addEventListener('DOMContentLoaded', tick);
