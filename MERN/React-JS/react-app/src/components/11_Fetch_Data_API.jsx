import React from 'react'
import { useState, useEffect } from 'react'

const Fetch_Data_API = () => {

    const [apiData, setApiData] = useState([])

    const fetchDataFromAPI = async () => {
        const api = await fetch("http://jsonplaceholder.typicode.com/posts/");
        const data = await api.json();

        setApiData(data);

        console.log("my data ", data);
    }

    useEffect(() => {
        fetchDataFromAPI();

    }, []);

    return (
        <div>
            {apiData.map((data) => (
                <div
                    key={data.id}
                    style={{ 
                        backgroundColor: 'green', 
                        margin: '10px', 
                        padding: '10px', 
                        border: '2px solid #eee', 
                        borderRadius: '5px', 
                        textAlign: 'center'
                    }}>
                    <h3>{data.title}</h3>
                </div>
            ))}
        </div>
    )
}

export default Fetch_Data_API