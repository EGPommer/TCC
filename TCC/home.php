<?php
// Verifica se o formulário de agendamento foi enviado
if (isset($_POST['submit'])) {
  include_once('config.php'); // Certifique-se de que config.php está correto e contém sua conexão com o banco de dados

    // Dados do usuário
    $data_agen = isset($_POST['data_agen']) ? $_POST['data_agen'] : '';
    $horario = isset($_POST['horario']) ? $_POST['horario'] : '';
    $profissional = isset($_POST['profissional']) ? $_POST['profissional'] : '';
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
    $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
    $estado = isset($_POST['estado']) ? $_POST['estado'] : '';
    $cep = isset($_POST['cep']) ? $_POST['cep'] : '';
    $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
    $rua = isset($_POST['rua']) ? $_POST['rua'] : '';
    $numero = isset($_POST['numero']) ? $_POST['numero'] : '';

    // Inserindo dados do usuário no banco de dados
    $result_usuario = mysqli_query($conexao, "INSERT INTO usuarios(data_agen, horario, profissional, nome, cpf, sexo, email, telefone, estado, cep, cidade, rua, numero) VALUES('$data_agen', '$horario', '$profissional', '$nome', '$cpf', '$sexo', '$email', '$telefone', '$estado', '$cep', '$cidade', '$rua', '$numero')");
    // Verifica se a inserção foi bem-sucedida
    if ($result_usuario) {
      echo '<script>alert("Obrigado por agendar sua consulta! Entraremos em contato em breve.");</script>';
  } else {
      echo '<script>alert("Desculpe, ocorreu um erro ao agendar a consulta. Por favor, tente novamente.");</script>';
  }
  }
// Verifica se o formulário de cadastro de profissional foi enviado
if (isset($_POST['submit_profissional'])) {
  // Inclua o arquivo de configuração do banco de dados
  include_once('config.php');

  // Dados do novo profissional
  $oab = isset($_POST['oab']) ? $_POST['oab'] : '';
  $nome_profissional = isset($_POST['nome_profissional']) ? $_POST['nome_profissional'] : '';

  // Inserir dados do novo profissional no banco de dados
  $result_profissional = mysqli_query($conexao, "INSERT INTO profissionais(oab, nome_profissional) VALUES('$oab', '$nome_profissional')");

  // Verifica se a inserção foi bem-sucedida
  if ($result_profissional) {
      echo '<script>alert("Novo profissional cadastrado com sucesso!");</script>';
  } else {
      echo '<script>alert("Desculpe, ocorreu um erro ao cadastrar o profissional. Por favor, tente novamente.");</script>';
  }
}
  
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Pommer Advocacia</title>
<link rel="stylesheet" href="home.css">

<!-- Adicione as linhas abaixo para importar a fonte 'Josefin Sans' -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<!-- Fim da importação da fonte 'Josefin Sans' -->

<style>
  /* Estilos gerais */
body {
  font-family: 'Josefin Sans', sans-serif;
  margin: 0;
  padding: 0;
  display: flex;
  flex-direction: column;
  min-height: 100vh;
  background-color: #fff; /* Branco */
  color: #000; /* Preto */
}

main {
  flex-grow: 1;
}

#header {
  background-color: #fff; /* Dourado */
  color: #fff; /* Branco */
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

/* Estilos para o rodapé */
footer {
  background-color: #f4f4f4;
  color: #666; /* Alterado para uma tonalidade mais escura para melhor contraste */
  padding: 10px;
  text-align: center;
  height: 200px;
}

/* Estilos para o efeito de hover nas caixas */
.box {
  width: 200px;
  height: 200px;
  background-color: #D9D9D9;
  border-radius: 8px;
  margin: 20px;
  transition: transform 0.3s ease-in-out;
}

.box:hover {
  transform: scale(1.1);
}

/* Adicione este CSS para estilizar os ícones do rodapé */
.social {
  display: flex;
  align-items: flex-start;
  padding: 10px 0;
  justify-content: space-between;
}

.social-icons{
  display: flex;
  align-items: flex-start;
}

.profile-icons {
  display: flex;
  flex-direction: column;
  align-items: flex-start; /* Alinhar os ícones no canto esquerdo verticalmente */
  margin-right: 20px; /* Espaçamento entre os perfis */
}

.profile-icons a {
  margin-bottom: 5px; /* Espaçamento entre os ícones */
}

.profile-icons img {
  width: 30px; /* Tamanho dos ícones */
  height: auto;
}

/* Estilo para o mapa interativo do Google */
#map-container {
  width: 300px; /* Largura do container do mapa */
  height: 200px; /* Altura do container do mapa */
  float: right; /* Alinhar o container do mapa à direita */
  margin-left: 0px; /* Adicionar um espaço à esquerda do container do mapa para separá-lo do conteúdo anterior */
  margin-bottom: 0px; /* Adicionar um espaço abaixo do container do mapa para separá-lo do conteúdo abaixo */
}

#map {
  width: 100%; /* Largura do mapa dentro do container */
  height: 100%; /* Altura do mapa dentro do container */
}


/* Estilos para o cabeçalho */
header {
  background-color: #f4f4f4;
  color: #000; /* Alterado para preto para melhor legibilidade */
  padding: 20px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 999;
}

header .logo {
  margin-right: auto;
}

header .logo img {
  max-width: 200px;
  height: auto;
  border-radius: 5px;
}

.menu {
  list-style: none;
  padding: 0;
  margin: 0;
}

header h1 {
  margin: 0;
  font-size: 30px;
}

header img {
  max-width: 200px;
  height: auto;
  margin-right: 100px;
}

.menu li {
  display: inline-block;
  margin-right: 10px;
}

.menu a {
  display: inline-block;
  padding: 20px;
  color: #000000;
  text-decoration: none;
}

.menu a:hover {
  color: #fff;
  background-color: #373737;
}

html {
  scroll-behavior: smooth;
  scroll-padding-top: 80px;
}

/* Estilos para a seção Sobre Nós */
#sobre-nos {
  padding: 40px 0;
  text-align: center;
  position: relative;
  color: #000; /* Branco */
  margin-top: 100px;
}

#sobre-nos::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(212, 175, 55, 0.5); /* Dourado com opacidade */
}

#sobre-nos .container {
  display: flex;
  flex-direction: column;
  align-items: center;
  z-index: 1; /* Definimos z-index: 1; para que o conteúdo fique acima do pseudo-elemento */
}

#sobre-nos .logo img {
  width: 200px;
  height: auto;
  border-radius: 5px;
}

#sobre-nos .content {
  max-width: 800px;
  margin: 0 auto;
}

#sobre-nos h2 {
  margin-bottom: 20px;
}

#sobre-nos p {
  font-size: 16px;
  line-height: 1.5;
}


/* Estilos para a seção Escritório */
#escritorio {
  padding: 40px 0;
  text-align: center;
}

#escritorio h2 {
  color: #000;
  margin-bottom: 30px;
}

#office-gallery {
  display: none; /* Oculta a galeria de imagens */
}

#office-video {
  display: block; /* Exibe o vídeo */
  max-width: 300px; /* Defina a largura máxima desejada para o vídeo */
  margin: 0 auto; /* Centralize o vídeo horizontalmente na página */
}

#office-video video {
  width: 100%;
  border-radius: 5px;
}


/* Estilos para a seção Áreas de Atuação */
#areas-atuacao .container {
  text-align: center;
}

#areas-atuacao h2.section-title {
  margin-bottom: 30px;
}

.area-cards-container {
  display: flex;
  justify-content: space-around;
  flex-wrap: wrap;
}

.area-card {
  width: 300px; /* Reduzimos um pouco o tamanho do card para evitar cortes de texto */
  background-color: #f2f2f2;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  margin: 20px;
  padding: 20px; /* Adicionamos um espaçamento interno para o conteúdo */
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  position: relative;
  height: 420px; /* Aumentamos um pouco a altura para melhor acomodar o texto */
  transition: box-shadow 0.3s ease-in-out;
  overflow: hidden;
}

.area-card img {
  max-width: 100px;
  height: auto;
  border-radius: 50%;
  margin-top: 20px;
}

.area-card h3 {
  color: #333;
  font-size: 20px;
  margin-bottom: 10px;
}

.area-card .area-description {
  color: #666;
  font-size: 14px;
  margin-bottom: 15px;
  flex-grow: 1; /* Faz o texto ocupar todo o espaço disponível no card */
}

/* Estilos para a seção Agendar Consulta */
#agendar-consulta {
  background-color: #f9f9f9;
  padding: 20px;
  text-align: center;
}

#appointment-form {
  max-width: 400px;
  margin: 0 auto;
}

#appointment-form h2 {
  margin-bottom: 20px;
  color: #000;
}

#appointment-form .form-group {
  margin-bottom: 20px;
}

#appointment-form label {
  display: block;
  text-align: center;
  margin-bottom: 5px;
  color: #666;
  font-size: 14px;
}

#appointment-form input[type="date"],
#appointment-form select {
  font-family: 'Josefin Sans', sans-serif;
  width: 100%;
  padding: 10px;
  border: none;
  border-bottom: 2px solid #ccc;
  border-radius: 0;
  background-color: transparent;
  color: #000;
  font-size: 16px;
  transition: border-color 0.3s ease-in-out;
}

#appointment-form input[type="date"]::placeholder,
#appointment-form select::placeholder {
  color: #999;
}

#appointment-form input[type="date"]:focus,
#appointment-form select:focus {
  outline: none;
  border-color: #000;
}

#professional-image-container {
  margin-top: 10px;
  display: none;
}

#professional-image {
  max-width: 100px;
  height: auto;
  border-radius: 5px;
}

#appointment-form button {
  font-family: 'Josefin Sans', sans-serif;
  background-color: #d4af37;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s ease-in-out;
  display: block; /* Adicionando esta propriedade para corrigir o deslocamento */
  margin: 0 auto; /* Centralizando o botão */
}

#appointment-form button:hover {
  background-color: #b89532;
}

@media screen and (max-width: 500px) {
  #appointment-form {
      max-width: 100%;
  }
}


  /* Estilos para o formulário de agendamento */
  #appointment-form {
    max-width: 600px;
    margin: 0 auto;
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  #appointment-form h2 {
    margin-bottom: 20px;
    color: #333;
    text-align: center;
  }

  #appointment-form .form-group {
    margin-bottom: 20px;
  }

  #appointment-form label {
    display: block;
    margin-bottom: 5px;
    color: #666;
    font-size: 14px;
  }

  #appointment-form input[type="date"],
  #appointment-form select,
  #appointment-form input[type="text"],
  #appointment-form input[type="email"],
  #appointment-form input[type="tel"] {
    width: calc(100% - 20px);
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f5f5f5;
    color: #333;
    font-size: 16px;
    transition: border-color 0.3s ease-in-out;
  }

  #appointment-form input[type="date"]::placeholder,
  #appointment-form select::placeholder,
  #appointment-form input[type="text"]::placeholder,
  #appointment-form input[type="email"]::placeholder,
  #appointment-form input[type="tel"]::placeholder {
    color: #999;
  }

  #appointment-form input[type="date"]:focus,
  #appointment-form select:focus,
  #appointment-form input[type="text"]:focus,
  #appointment-form input[type="email"]:focus,
  #appointment-form input[type="tel"]:focus {
    outline: none;
    border-color: #000;
  }

  #professional-image-container {
    margin-top: 10px;
    text-align: center;
  }

  #professional-image {
    max-width: 100px;
    height: auto;
    border-radius: 5px;
  }

  #appointment-form button {
    background-color: #d4af37;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
    display: block;
    margin: 0 auto;
  }

  #appointment-form button:hover {
    background-color: #b89532;
  }

</style>

</head>
<body>
  <header id="header"> <!-- Cabeçalho da página -->
    <a href="index.html"> <!-- Link para a página inicial -->
      <img src="Imagens/LogoEscuraPequena.png" alt="Sua Logo" width="200"> <!-- Imagem da logo -->
    </a>
    <nav>
      <ul class="menu"> <!-- Lista não ordenada que contém os itens do menu de navegação -->
        <li><a href="#inicio">Início</a></li> <!-- Link para a seção Início -->
        <li><a href="#sobre-nos">Sobre Nós</a></li> <!-- Link para a seção Sobre Nós -->
        <li><a href="#escritorio">Nosso Escritório</a></li> <!-- Link para a seção Nosso Escritório -->
        <li><a href="#areas-atuacao">Áreas de Atuação</a></li> <!-- Link para a seção Áreas de Atuação -->
        <li><a href="#agendar-consulta">Agendar Consulta</a></li> <!-- Link para a seção Agendar Consulta -->
      </ul>
    </nav>
  </header>

  <main>
    <!-- Conteúdo principal da página -->
    <section id="inicio"> <!-- Seção Início -->
      <!-- Conteúdo da seção Início -->
    </section>

    <section id="sobre-nos"> <!-- Seção Sobre Nós -->
      <div class="container"> <!-- Container para centralizar o conteúdo -->
        <div class="logo"> <!-- Div para exibir a logo -->
          <img src="Imagens/LogoEscura.png" alt="Logo do Escritório"> <!-- Imagem da logo -->
        </div>
        <div class="content"> <!-- Div para o conteúdo do texto -->
          <h2>Sobre Nós</h2> <!-- Título da seção Sobre Nós -->
          <p>Somos um escritório de advocacia dedicado a fornecer serviços jurídicos de alta qualidade para nossos clientes. Nossa equipe de advogados altamente experientes está comprometida em oferecer soluções eficazes e estratégias legais personalizadas para atender às necessidades individuais de cada cliente. Nosso objetivo é proteger os interesses de nossos clientes e garantir a defesa de seus direitos.</p> <!-- Texto da seção Sobre Nós -->
        </div>
      </div>
    </section>

    <section id="escritorio"> <!-- Seção Nosso Escritório -->
      <h2>Nosso Escritório</h2> <!-- Título da seção Nosso Escritório -->
      <div id="office-video"> <!-- Div para o vídeo -->
        <video width="100%" controls> <!-- Elemento de vídeo -->
          <source src="imagens/Escritório.mp4" type="video/mp4"> <!-- Fonte do vídeo -->
          Seu navegador não suporta o elemento de vídeo. <!-- Mensagem exibida caso o navegador não suporte vídeo -->
        </video>
      </div>
    </section>

    <section id="areas-atuacao" class="section"> <!-- Seção Áreas de Atuação -->
      <div class="container"> <!-- Container para centralizar o conteúdo -->
        <h2 class="section-title">Áreas de Atuação</h2> <!-- Título da seção Áreas de Atuação -->
        <div class="area-cards-container"> <!-- Container para os cards de Áreas de Atuação -->
          <div class="area-card"> <!-- Card de uma Área de Atuação -->
            <img src="Imagens/direito-empresarial.png" alt="Área de Atuação 1" class="area-image"> <!-- Imagem da Área de Atuação -->
            <h3 class="area-title">Direito Empresarial</h3> <!-- Título da Área de Atuação -->
            <p class="area-description">Direito comercial é um ramo do direito privado que pode ser entendido como o conjunto de normas disciplinadoras da atividade negocial do empresário, e de qualquer pessoa física ou jurídica.</p> <!-- Descrição da Área de Atuação -->
          </div>
          <div class="area-card">
            <img src="Imagens/direito-penal.png" alt="Área de Atuação 2" class="area-image">
            <h3 class="area-title">Direito Penal</h3>
            <p class="area-description">O direito penal ou direito criminal é a disciplina de direito público que regula o exercício do poder punitivo do Estado, tendo por pressuposto de ação delitos e como consequência as penas.</p>
        </div>
        <div class="area-card">
            <img src="Imagens/direito-trabalhista.png" alt="Área de Atuação 3" class="area-image">
            <h3 class="area-title">Direito Trabalhista</h3>
            <p class="area-description">Direito do trabalho é o ramo jurídico que estuda as relações de trabalho. Esse direito é composto de conjuntos de normas, princípios e outras fontes jurídicas que regem as relações de trabalho, regulamentando a condição jurídica dos trabalhadores.</p>
        </div>
        <div class="area-card">
            <img src="Imagens/diretiro-civil.png" alt="Área de Atuação 3" class="area-image">
            <h3 class="area-title">Direito Civil</h3>
            <p class="area-description">O Direito Civil é o ramo do direito privado que trata das normas que regulam os direitos e obrigações das pessoas físicas e jurídicas nas suas relações patrimoniais, familiares e obrigacionais.</p>
        </div>
      </div>
    </section>

    <form action="home.php" method="POST">
    <section id="agendar-consulta"> <!-- Seção Agendar Consulta -->
      <div id="appointment-form"> <!-- Formulário para agendar consulta -->
        <h2>Agendar Consulta</h2> <!-- Título da seção Agendar Consulta -->
          <div class="form-group"> <!-- Grupo de formulário -->
            <label for="date">Data:</label> <!-- Rótulo para o campo de data -->
            <input type="date" id="date" name="data_agen" required> <!-- Campo de entrada de data -->
          </div>
          <p id="weekend-message" style="display: none;">Desculpe, não atendemos em finais de semana e feriados.</p> <!-- Mensagem para exibir se a data for um final de semana -->
          <div class="form-group">
            <label for="time">Horário:</label>
            <select id="time" name="horario" required>
              <option value="">Selecione o horário</option>
            </select>
          </div>
          <div class="form-group">
            <label for="professional">Profissional:</label>
            <select id="profissional" name="profissional" required onchange="showProfessionalImage()">
              <option value="">Selecione o profissional</option>
              <option value="Jackson" data-image="	http://localhost/imagens/1.png">Dr. Jackson Pommer</option>
              <option value="Paulo" data-image="	http://localhost/imagens/2.png">Dr. Paulo Dolla</option>
            </select>
          </div>
          <div id="professional-image-container">
            <img id="professional-image" src="imagens/jackson.png" alt="Imagem do Profissional">
          </div>
          <div class="form-group">
          </div>
          <input type="text" id="nome" name="nome" required maxlength="100" placeholder="Nome:">
          <input type="text" id="cpf" name="cpf" required maxlength="11" placeholder="CPF:">
          <select id="sexo" name="sexo" required>
            <option value="">Sexo:</option>
            <option value="feminino">Feminino</option>
            <option value="masculino">Masculino</option>
            <option value="outro">Outro</option>
          </select>
          <input type="email" id="email" name="email" required maxlength="100" placeholder="Email:">
          <input type="tel" id="telefone" name="telefone" required maxlength="15" placeholder="Telefone:">
          <select id="estado" name="estado" required>
            <option value="">Estado:</option>
            <option value="">Estado:</option>
            <option value="AC">Acre</option>
            <option value="AL">Alagoas</option>
            <option value="AP">Amapá</option>
            <option value="AM">Amazonas</option>
            <option value="BA">Bahia</option>
            <option value="CE">Ceará</option>
            <option value="DF">Distrito Federal</option>
            <option value="ES">Espírito Santo</option>
            <option value="GO">Goiás</option>
            <option value="MA">Maranhão</option>
            <option value="MT">Mato Grosso</option>
            <option value="MS">Mato Grosso do Sul</option>
            <option value="MG">Minas Gerais</option>
            <option value="PA">Pará</option>
            <option value="PB">Paraíba</option>
            <option value="PR">Paraná</option>
            <option value="PE">Pernambuco</option>
            <option value="PI">Piauí</option>
            <option value="RJ">Rio de Janeiro</option>
            <option value="RN">Rio Grande do Norte</option>
            <option value="RS">Rio Grande do Sul</option>
            <option value="RO">Rondônia</option>
            <option value="RR">Roraima</option>
            <option value="SC">Santa Catarina</option>
            <option value="SE">Sergipe</option>
            <option value="SP">São Paulo</option>
            <option value="TO">Tocantins</option>
          <input type="text" id="cep" name="cep" required maxlength="10" placeholder="CEP :">
          </select>
          <input type="text" id="cidade" name="cidade" required maxlength="100" placeholder="Cidade:">
          <input type="text" id="rua" name="rua" required maxlength="100" placeholder="Rua:">
          <input type="text" id="numero" name="numero" required maxlength="10" placeholder="Número:">
          <button type="submit" id="submit-button" name="submit">Agendar</button>
    </form>
      </div>
    </section>
    
  </main>
  

  <footer> <!-- Rodapé da página -->
    <div class="social">
            <div class="social-icons">
              <div class="profile-icons">
                <a href="https://api.whatsapp.com/send?phone=seu_numero_do_whatsapp_jackson" target="_blank">
                  <img src="imagens/zap.com.png" alt="WhatsApp de Jackson Pommer">
                </a>
                <a href="https://www.instagram.com/dr.jacksonpommer" target="_blank">
                  <img src="imagens/insta.com.png" alt="Instagram de Jackson Pommer">
                </a>
                <span>Jackson Pommer</span>
              </div>
              <div class="profile-icons">
                <a href="https://api.whatsapp.com/send?phone=seu_numero_do_whatsapp_paulo" target="_blank">
                  <img src="imagens/zap.com.png" alt="WhatsApp de Paulo Dolla">
                </a>
                <a href="https://www.instagram.com/paulo_dolla" target="_blank">
                  <img src="imagens/insta.com.png" alt="Instagram de Paulo Dolla">
                </a>
                <span>Paulo Dolla</span>
              </div>
            </div>
            <div>
              <p>Todos os direitos reservados©</p>
              <p>Endereço: Rua General Osório, 1873 - Cascavel - PR</p>
              <p>Telefone: (45) 99861-8236</p> 
              <p>CNPJ: 50.041.187/0001-40</p> 
            </div>
            <!-- Mapa interativo do Google -->
            <div id="map-container">
              <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3616.8125372898903!2d-53.46032028823532!3d-24.972491914856317!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94f3d43837cdff3b%3A0x7a79e01dd78f665b!2sR.%20Gen.%20Os%C3%B3rio%2C%201873%20-%20Parque%20S%C3%A3o%20Paulo%2C%20Cascavel%20-%20PR%2C%2085803-760!5e0!3m2!1spt-BR!2sbr!4v1690133950053!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </footer>

<!-- Formulário de Cadastro de Novo Profissional -->
<form action="home.php" method="POST">
  <h3>Cadastro de Novo Profissional</h3>
  <label for="oab">OAB:</label>
  <input type="text" id="oab" name="oab" required>

  <label for="nome_profissional">Nome Completo:</label>
  <input type="text" id="nome_profissional" name="nome_profissional" required>

  <!-- Outros campos do profissional, se necessário -->

  <button type="submit" name="submit_profissional">Salvar</button>
</form>

  <script> 
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

  // Função para exibir a imagem do profissional selecionado
  function showProfessionalImage() {
    const selectedProfissional = document.getElementById('profissional');
    const selectedImageSrc = selectedProfissional.options[selectedProfissional.selectedIndex].getAttribute('data-image');
    const professionalImage = document.getElementById('professional-image');
    
    professionalImage.src = selectedImageSrc;
    document.getElementById('professional-image-container').style.display = 'block';
  }

// Função para verificar se a data selecionada é um final de semana
function isWeekend(date) {
  const dayOfWeek = date.getDay();
  return dayOfWeek === 6 || dayOfWeek === 5; // 5 = Domingo, 6 = Sábado
}

// Mensagem de bloqueio para finais de semana
const dateInput = document.getElementById('date');
const messageElement = document.getElementById('weekend-message');

dateInput.addEventListener('change', function () {
  const selectedDate = new Date(this.value);
  const dayOfWeek = selectedDate.getDay();

  if (dayOfWeek === 6 || dayOfWeek === 5) {
      messageElement.style.display = 'block';
  } else {
      messageElement.style.display = 'none';
  }
});

// Botão Agendar sumir, bloqueio para finais de semana
const submitButton = document.getElementById('submit-button');

dateInput.addEventListener('change', function () {
    const selectedDate = new Date(this.value);
    if (isWeekend(selectedDate)) {
        submitButton.style.display = 'none';
    } else {
        submitButton.style.display = 'block';
    }
});

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


 </script>

</body>

</html>