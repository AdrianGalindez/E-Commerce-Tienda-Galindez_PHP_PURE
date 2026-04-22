const lbsInput   = document.getElementById("lbsInput");
const fallZone   = document.getElementById("fallZone");
const grainPile  = document.getElementById("grainPile");
const weightText = document.getElementById("weightText");

let current = 0;
let target = 1;
let timerBeans = null;
let timerWeight = null;


// crea grano cayendo
function createBean(){

    const bean = document.createElement("div");

    bean.classList.add("bean");

    bean.style.left = Math.random() * 70 + "px";

    fallZone.appendChild(bean);

    setTimeout(() => bean.remove(), 900);
}


// actualiza gráfico
function updateVisual(){

    let percent = (current / target) * 100;

    if(percent > 100){
        percent = 100;
    }

    grainPile.style.height = percent + "%";

    weightText.textContent = current.toFixed(1);
}


// inicia animación
function startAnimation(){

    timerBeans = setInterval(() => {

        if(current < target){
            createBean();
        }

    }, 60);


    timerWeight = setInterval(() => {

        if(current < target){

            current += 0.1;

            if(current > target){
                current = target;
            }

            updateVisual();

        }else{

            clearInterval(timerBeans);
            clearInterval(timerWeight);

        }

    }, 90);
}


// reinicia
function resetAnimation(){

    clearInterval(timerBeans);
    clearInterval(timerWeight);

    current = 0;

    target = parseFloat(lbsInput.value);

    if(target < 1){
        target = 1;
    }

    grainPile.style.height = "0%";

    weightText.textContent = "0.0";

    fallZone.innerHTML = "";

    startAnimation();
}


// escuchar cambios
lbsInput.addEventListener("input", resetAnimation);


// iniciar
resetAnimation();