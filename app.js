// Tüm elementleri seçmek ;

const form = document.querySelector("#todoAddForm");
const addInput = document.querySelector("#todoName");
const todoList = document.querySelector(".list-group")
const firstCardBody = document.querySelectorAll(".card-body")[0];
const secondCardBody = document.querySelectorAll(".card-body")[1];
const clearButton = document.querySelector("#clearButton");
const filterInput = document.querySelector("#todoSearch");

let todos = [];

runEvents();

function runEvents() {
    form.addEventListener("submit", addTodo);
    document.addEventListener("DOMContentLoaded", pageLoaded);
    secondCardBody.addEventListener("click", removeTodoToUI);
    clearButton.addEventListener("click", allTodosClear);
    filterInput.addEventListener("keyup", filter);
}

function filter(e) {
    const filterInputValue = e.target.value.toLowerCase().trim();
    const todoList = document.querySelectorAll(".list-group-item");

    if (todoList.length > 0) {
        todoList.forEach(function (todo) {
            if (todo.textContent.toLowerCase().trim().includes(filterInputValue)) {
                todo.setAttribute("style", "display: block")
            }
            else {
                todo.setAttribute("style", "display : none !important")
            }
        });
    }
    else {
        showAlert("danger", "404")
    }
}

function allTodosClear() {
    const todoListesi = document.querySelectorAll(".list-group-item")
    if (todoListesi.length > 0) {
        todoListesi.forEach(function (todo) {
            todo.remove();
        })

        todos = [];
        localStorage.setItem("todos", JSON.stringify(todos));
    }
    else {
        showAlert("warning", "TODO is not found");
    }
}

function removeTodoToUI(e) {
    if (e.target.className === "fa fa-remove") {

        //ekrandan silme
        const todo = e.target.parentElement.parentElement;
        todo.remove();
        showAlert("danger", `${'" ' + todo.textContent + ' "'} is deleted`)
        //storageden silme
        removoTodoToStorage(todo.textContent);


    }
}

function removoTodoToStorage(removeTodo) {
    checkTodosFromStorage();
    todos.forEach(function (todo, index) {
        if (removeTodo === todo) {
            todos.splice(index, 1);
        }
    })
    localStorage.setItem("todos", JSON.stringify(todos));
}

function pageLoaded() {
    checkTodosFromStorage();
    todos.forEach(function (todo) {
        addTodoUI(todo);
    });
}


function addTodo(e) {
    const inpuText = addInput.value.trim();
    if (inpuText == null || inpuText == "") {
        showAlert("warning", "Please do not leave blank! Enter a value!")
    }
    else {
        //arayüze ekleme
        addTodoUI(inpuText)
        addTodoToStorage(inpuText);
        showAlert("success", "TODO has been successfully added!")
    }

    //storage ekleme
    e.preventDefault();
}

function addTodoUI(newTodo) {
    /*
    <li class="list-group-item d-flex justify-content-between">Todo 1
        <a href="#" class="delete-item">
            <i class="fa fa-remove"></i>
        </a>
    </li>
    */

    const li = document.createElement("li");
    li.className = "list-group-item d-flex justify-content-between";
    li.textContent = newTodo;

    const a = document.createElement("a");
    a.href = "#";
    a.className = "delete-item";

    const i = document.createElement("i");
    i.className = "fa fa-remove"

    a.appendChild(i);
    li.appendChild(a);
    todoList.appendChild(li);

    addInput.value = " ";
}

function addTodoToStorage(newTodo) {
    checkTodosFromStorage();
    todos.push(newTodo);
    localStorage.setItem("todos", JSON.stringify(todos));

}

function checkTodosFromStorage() {
    if (localStorage.getItem("todos") === null) {
        todos = [];
    }
    else {
        todos = JSON.parse(localStorage.getItem("todos"));
    }
}


function showAlert(type, message) {
    /*
    <div class="alert alert-warning" role="alert">
        A simple warning alert—check it out!
    </div>
    */

    const div = document.createElement("div");
    div.className = `alert alert-${type}`;
    div.textContent = message;

    // CSS kodunu ekleyin
    const css = `
        .alert {
            opacity: 1;
            visibility: visible;
            transition: opacity 1s ease-in-out, visibility 1s ease-in-out;
        }
        .alert.hide {
            opacity: 0;
            visibility: hidden;
        }`;
    const style = document.createElement('style');
    style.appendChild(document.createTextNode(css));
    document.head.appendChild(style);


    firstCardBody.appendChild(div);


    setTimeout(function () {
        div.classList.add('hide');
        setTimeout(function () {
            div.remove();
        }, 1000);
    }, 2000);
}




// window.onbeforeunload = function () {
//     return "Sayfayı yenilemek istediğinize emin misiniz?";
// }
