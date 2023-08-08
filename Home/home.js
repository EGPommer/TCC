// Função para preencher a lista de horários no formulário de agendamento
function fillTimeOptions() {
  const selectTime = document.getElementById('time');
  const startHour = 8; // Horário de início (8h)
  const endHour = 18; // Horário de término (18h)

  selectTime.innerHTML = ''; // Limpar as opções existentes

  for (let hour = startHour; hour <= endHour; hour++) {
    for (let minute = 0; minute < 60; minute += 30) {
      const timeString = `${String(hour).padStart(2, '0')}:${String(minute).padStart(2, '0')}`;
      const option = new Option(timeString, timeString);
      selectTime.appendChild(option);
    }
  }
}

// Chamar a função para preencher as opções de horários quando a página for carregada
fillTimeOptions();


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

// Imagem do profissioal
function showProfessionalImage() {
    const selectElement = document.getElementById("professional");
    const imageContainer = document.getElementById("professional-image-container");
    const imageElement = document.getElementById("professional-image");
    
    const selectedOption = selectElement.options[selectElement.selectedIndex];
    const imageURL = selectedOption.dataset.image;
    
    if (imageURL) {
      imageElement.src = imageURL;
      imageContainer.style.display = "block";
    } else {
      imageContainer.style.display = "none";
    }
  }
  
  // Chame a função toggleGalleryAndVideo passando true para exibir o vídeo ou false para exibir a galeria de imagens
  // Por exemplo, toggleGalleryAndVideo(true) para exibir o vídeo ou toggleGalleryAndVideo(false) para exibir a galeria de imagens.
  
  // Exemplo: exibir o vídeo quando o usuário clica em um botão (você pode personalizar isso de acordo com suas necessidades)
  const showVideoButton = document.getElementById('show-video-button');
  const showGalleryButton = document.getElementById('show-gallery-button');
  
  showVideoButton.addEventListener('click', function () {
    toggleGalleryAndVideo(true);
  });
  
  showGalleryButton.addEventListener('click', function () {
    toggleGalleryAndVideo(false);
  });
  