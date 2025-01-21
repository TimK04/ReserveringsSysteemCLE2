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

// function selectDate(cell) {
//     // Verwijder eerdere selectie
//     const selectedCells = document.querySelectorAll('.selected');
//     selectedCells.forEach(cell => cell.classList.remove('selected'));
//
//     // Voeg klasse toe aan geselecteerde cel
//     cell.classList.add('selected');
//
//     // Update verborgen invoerveld met de geselecteerde datum
//     const selectedDateInput = document.getElementById('selectedDate');
//     const selectedDay = cell.textContent;
//     const [month, year] = monthAndYear.textContent.split(' ');
//     selectedDateInput.value = `${selectedDay} ${month} ${year}`;
// }

function selectDate(cell) {
    // Markeer de geselecteerde cel
    const selectedCells = document.querySelectorAll('.selected');
    selectedCells.forEach(cell => cell.classList.remove('selected'));
    cell.classList.add('selected');

    // Haal de geselecteerde datum op
    const selectedDateInput = document.getElementById('selectedDate');
    const selectedDay = cell.textContent.padStart(2, '0');
    const [month, year] = monthAndYear.textContent.split(' ');

    const monthNumber = new Date(`${month} 1, ${year}`).getMonth() + 1;
    const formattedMonth = String(monthNumber).padStart(2, '0');
    const formattedDate = `${year}-${formattedMonth}-${selectedDay}`;

    selectedDateInput.value = formattedDate;

    // Toon het tijdselectiegedeelte en werk de beschikbare tijden bij
    const timeSelectionContainer = document.getElementById('timeSelectionContainer');
    const dateSelectionMessage = document.getElementById('dateSelectionMessage');
    timeSelectionContainer.style.display = 'block'; // Maak zichtbaar
    dateSelectionMessage.style.display = 'none'; // Maar onzichtbaar
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