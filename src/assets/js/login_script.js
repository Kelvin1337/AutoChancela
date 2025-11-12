const regexPlacaBR = /^[A-Z]{3}[0-9][A-Z][0-9]{2}$|^[A-Z]{3}[0-9]{4}$/;
const placasNaoAceitas = ["PY","PAR","ARG","URU","UY","CHL","BOL","VE"];
const montadorasConhecidas = ["Honda","Volkswagen","VW","Audi","Toyota","Ford","Chevrolet","GM","Fiat","Hyundai","Renault","Peugeot","Nissan","BMW","Mercedes","Jeep","Kia","Citroën","Volvo","Chery"];

let veiculos = JSON.parse(localStorage.getItem("veiculos_" + RAusuario)) || [];
let indexEdicao = null;

function salvarLocal() {
    localStorage.setItem("veiculos_" + RAusuario, JSON.stringify(veiculos));
}

function renderVeiculos() {
    const lista = document.getElementById("vehicle-list");
    lista.innerHTML = "";
    veiculos.forEach((v,i)=>{
        const item = document.createElement("div");
        item.className="vehicle-item";
        item.innerHTML = `
        <div class="vehicle-info">
            <strong>Tipo:</strong> ${v.tipo}<br/>
            <strong>Modelo:</strong> ${v.modelo}<br/>
            <strong>Cor:</strong> ${v.cor}<br/>
            <strong>Ano:</strong> ${v.ano}<br/>
            <strong>Placa:</strong> ${v.placa}
        </div>
        <div class="actions">
            <button class="btn-icon" onclick="editar(${i})"><i class="fas fa-edit"></i></button>
            <button class="btn-icon" onclick="remover(${i})"><i class="fas fa-trash"></i></button>
        </div>`;
        lista.appendChild(item);
    });
}

function abrirFormulario() {
    document.getElementById("main-screen").style.display="none";
    document.getElementById("form-screen").style.display="flex";
}

function voltar() {
    document.getElementById("main-screen").style.display="block";
    document.getElementById("form-screen").style.display="none";
    document.getElementById("edit-screen").style.display="none";
}

function validarCampos(tipo,modelo,cor,ano,placa){
    const anoAtual = new Date().getFullYear();
    if(!tipo || !modelo || !cor || isNaN(ano) || !placa) return false;
    if(!regexPlacaBR.test(placa)) return false;
    if(placasNaoAceitas.some(p=>placa.toUpperCase().startsWith(p))) return false;
    const modeloLimpo = modelo.trim().toLowerCase();
    if(montadorasConhecidas.some(m=>m.toLowerCase()===modeloLimpo)) return false;
    if(ano<1900 || ano>anoAtual) return false;
    return true;
}

function adicionarVeiculo(){
    const tipo = document.getElementById("novo-tipo").value;
    const modelo = document.getElementById("novo-modelo").value.trim();
    const cor = document.getElementById("novo-cor").value;
    const ano = parseInt(document.getElementById("novo-ano").value);
    const placa = document.getElementById("novo-placa").value.toUpperCase().trim();

    if(!validarCampos(tipo,modelo,cor,ano,placa)){
        Swal.fire("Erro","Preencha todos os campos corretamente.","error");
        return;
    }

    veiculos.push({tipo,modelo,cor,ano,placa});
    salvarLocal();
    voltar();
    renderVeiculos();
    Swal.fire("Sucesso","Veículo adicionado!","success");
}

function editar(index){
    indexEdicao=index;
    const v=veiculos[index];
    document.getElementById("edit-tipo").value=v.tipo;
    document.getElementById("edit-modelo").value=v.modelo;
    document.getElementById("edit-cor").value=v.cor;
    document.getElementById("edit-ano").value=v.ano;
    document.getElementById("edit-placa").value=v.placa;
    document.getElementById("main-screen").style.display="none";
    document.getElementById("edit-screen").style.display="flex";
}

function salvarEdicao(){
    const tipo=document.getElementById("edit-tipo").value;
    const modelo=document.getElementById("edit-modelo").value.trim();
    const cor=document.getElementById("edit-cor").value;
    const ano=parseInt(document.getElementById("edit-ano").value);
    const placa=document.getElementById("edit-placa").value.toUpperCase().trim();

    if(!validarCampos(tipo,modelo,cor,ano,placa)){
        Swal.fire("Erro","Preencha todos os campos corretamente.","error");
        return;
    }

    veiculos[indexEdicao]={tipo,modelo,cor,ano,placa};
    salvarLocal();
    voltar();
    renderVeiculos();
    Swal.fire("Sucesso","Veículo atualizado!","success");
}

function remover(index){
    Swal.fire({
        title:"Tem certeza?",
        text:"Isso excluirá o veículo permanentemente.",
        icon:"warning",
        showCancelButton:true,
        confirmButtonText:"Sim, excluir",
        cancelButtonText:"Cancelar"
    }).then(result=>{
        if(result.isConfirmed){
            veiculos.splice(index,1);
            salvarLocal();
            renderVeiculos();
            Swal.fire("Excluído!","O veículo foi removido.","success");
        }
    });
}

renderVeiculos();
