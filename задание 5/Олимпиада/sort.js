let s = document.getElementById('score');
s.addEventListener('click', function(){
    // получаем массив из строк таблицы
    let sortedRows = Array.from(table.rows)
    .slice(1)
    .sort((rowA, rowB) => {
        return rowA.cells[2].innerHTML - rowB.cells[2].innerHTML
    })
    table.tBodies[0].append(...sortedRows);
})

let n = document.getElementById('name');
n.addEventListener('click', function(){
    // получаем массив из строк таблицы
    let sortedRows = Array.from(table.rows)
    .slice(1)
    .sort((a, b) => a.cells[1].innerHTML.localeCompare(b.cells[1].innerHTML))
    table.tBodies[0].append(...sortedRows);
})

let id = document.getElementById('index');
id.addEventListener('click', function(){
    // получаем массив из строк таблицы
    let sortedRows = Array.from(table.rows)
    .slice(1)
    .sort((rowA, rowB) => {
        return rowA.cells[0].innerHTML - rowB.cells[0].innerHTML
    })
    table.tBodies[0].append(...sortedRows);
})
