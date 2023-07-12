// horários de 30 em 30 minutos, com bloqueio para finais de semana
const timeSelect = document.getElementById('time');

// Definir horário de início e fim
const startTime = 8; // 8:00
const endTime = 18; // 18:00

// Gerar horários de 30 em 30 minutos
for (let hour = startTime; hour <= endTime; hour++) {
    for (let minute = 0; minute < 60; minute += 30) {
        // Verificar se é final de semana (sábado = 6, domingo = 0)
        const currentDate = new Date();
        const currentDayOfWeek = currentDate.getDay();
        const selectedDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate(), hour, minute);

        if (currentDayOfWeek !== 5 && currentDayOfWeek !== 6 && selectedDate.getDay() !== 5 && selectedDate.getDay() !== 6) {
            const time = `${hour.toString().padStart(2, '0')}:${minute.toString().padStart(2, '0')}`;
            const option = document.createElement('option');
            option.value = time;
            option.textContent = time;
            timeSelect.appendChild(option);
        }
    }
}

// Mensagem de bloqueio para finais de semana
const dateInput = document.getElementById('date');
const messageElement = document.getElementById('weekend-message');

dateInput.addEventListener('change', function () {
    const selectedDate = new Date(this.value);
    const dayOfWeek = selectedDate.getDay();

    if (dayOfWeek === 5 || dayOfWeek === 6) {
        messageElement.style.display = 'block';
    } else {
        messageElement.style.display = 'none';
    }
});

// Botão Agendar sumir, bloqueio para finais de semana
const appointmentForm = document.getElementById('appointment-form');
const submitButton = document.getElementById('submit-button');

dateInput.addEventListener('change', function () {
    const selectedDate = new Date(this.value);
    const dayOfWeek = selectedDate.getDay();

    if (dayOfWeek === 5 || dayOfWeek === 6) {
        submitButton.style.display = 'none';
    } else {
        submitButton.style.display = 'block';
    }
});
