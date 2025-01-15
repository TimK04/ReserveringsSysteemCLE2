const calendar = document.getElementById('calendar');
const calendarBody = document.getElementById('calendarBody');
const monthAndYear = document.getElementById('monthAndYear');
const prevMonthButton = document.getElementById('prevMonth');
const nextMonthButton = document.getElementById('nextMonth');

let currentDate = new Date();

function renderCalendar(date) {
    // Maand en jaar weergeven
    const year = date.getFullYear();
    const month = date.toLocaleString('default', {month: 'long'});
    monthAndYear.textContent = `${month} ${year}`;

    // Dagen van de maand vullen
    const firstDayOfMonth = new Date(year, date.getMonth(), 1).getDay();
    const lastDateOfMonth = new Date(year, date.getMonth() + 1, 0).getDate();

    // Maand begint op maandag (JS start op zondag, dus aanpassen)
    const adjustedFirstDay = (firstDayOfMonth === 0 ? 7 : firstDayOfMonth);

    calendarBody.innerHTML = ''; // Maak kalender leeg

    let dayCounter = 1;
    for (let row = 0; row < 6; row++) { // Maximaal 6 rijen
        const tr = document.createElement('tr');
        for (let col = 0; col < 7; col++) {
            const td = document.createElement('td');
            if (row === 0 && col < adjustedFirstDay - 1 || dayCounter > lastDateOfMonth) {
                td.textContent = ''; // Lege cellen
            } else {
                td.textContent = dayCounter;
                td.addEventListener('click', () => selectDate(td)); // Klikbare dagen
                dayCounter++;
            }
            tr.appendChild(td);
        }
        calendarBody.appendChild(tr);
    }
}

function selectDate(cell) {
    // Verwijder eerdere selectie
    const selectedCells = document.querySelectorAll('.selected');
    selectedCells.forEach(cell => cell.classList.remove('selected'));

    // Voeg klasse toe aan geselecteerde cel
    cell.classList.add('selected');

    // Update verborgen invoerveld met de geselecteerde datum
    const selectedDateInput = document.getElementById('selectedDate');
    const selectedDay = cell.textContent;
    const [month, year] = monthAndYear.textContent.split(' ');
    selectedDateInput.value = `${selectedDay} ${month} ${year}`;
}

// Event Listeners voor navigatie
prevMonthButton.addEventListener('click', () => {
    currentDate.setMonth(currentDate.getMonth() - 1);
    renderCalendar(currentDate);
});

nextMonthButton.addEventListener('click', () => {
    currentDate.setMonth(currentDate.getMonth() + 1);
    renderCalendar(currentDate);
});

// Render eerste kalender
renderCalendar(currentDate);