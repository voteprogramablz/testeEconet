function showInputError(element, message) {
    const errorElement = document.createElement("span");
    errorElement.className += "text-danger mt-3";
    errorElement.dataset.errorInput = true;
    errorElement.innerText = message;
    element.parentNode.insertBefore(errorElement, element.nextSibling);
}

const removeErrorElements = () => $("[data-error-input]").remove();

$("#name")
    .blur(({ target }) => {
        const [_, lastName] = target.value.split(" ");

        if (!lastName) {
            removeErrorElements();
            showInputError(target, "Insira seu nome e sobrenome");
        }
    })
    .keyup(removeErrorElements);

$("#cpf")
    .blur(({ target }) => {
        removeErrorElements();
        if (target.value.length < 14) showInputError(target, "CPF incompleto");
    })
    .keyup(removeErrorElements);

// $('button[type="submit"]').click((event) => {
//     event.preventDefault();
//     if ($("[data-error-input]").length) {
//         removeErrorElements();
//         showInputError(event.target, "Preencha os campos corretamente.");
//     } else {
//         $("form").submit();
//     }
// });

// Masks
$("#cpf").mask("000.000.000-00");
// $("#price").mask("R$ 999.999.999,99");
