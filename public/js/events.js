// Function to filter events by type and search by name
function updateEventDisplay() {
  const searchValue = document.getElementById('searchInput').value.toLowerCase();
  const filterValue = document.getElementById('filterSelect').value.toLowerCase();
  const events = document.querySelectorAll('.event');
  events.forEach(event => {
    const eventName = event.querySelector('h2').innerText.toLowerCase();
    const eventType = event.getAttribute('data-type').toLowerCase();
    const matchesSearch = eventName.includes(searchValue);
    const matchesFilter = filterValue === '' || eventType.includes(filterValue);
    if (matchesSearch && matchesFilter) {
      event.style.display = 'block';
    } else {
      event.style.display = 'none';
    }
  });
}
// Event listeners for search input and filter select
document.getElementById('searchInput').addEventListener('input', updateEventDisplay);
document.getElementById('filterSelect').addEventListener('change', updateEventDisplay);
// Initial display update
updateEventDisplay();