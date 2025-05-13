document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("formAgendamento");
  const mensagem = document.getElementById("mensagem");

  form.addEventListener("submit", (e) => {
    e.preventDefault();

    const nome = form.elements[0].value;
    const data = form.elements[1].value;
    const hora = form.elements[2].value;
    const barbeiro = form.elements[3].value;

    if (nome && data && hora && barbeiro) {
      mensagem.textContent = `Obrigado, ${nome}! Seu agendamento com ${barbeiro} foi marcado para ${data} às ${hora}.`;
      mensagem.style.color = "green";
      form.reset();
    } else {
      mensagem.textContent = "Por favor, preencha todos os campos.";
      mensagem.style.color = "red";
    }
  });
});