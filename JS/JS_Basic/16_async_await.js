const fetchData = async () => {
    const api = await fetch('https://jsonplaceholder.typicode.com/todos/1');
    const data = await api.json();

    console.log(data);
}

fetchData();