import React, { useState } from 'react'
import PixabayContext from './PixabayContext'
import { useEffect } from 'react';

const PixabayState = (props) => {
    const [imageData, setImageData] = useState([]);
    const [query, setQuery] = useState('london');
    const [limit, setLimit] = useState(30)
    const [pageNumber, setPageNumber] = useState(1)

    const api_key = '50021868-ddc233ae7e49523248cdbe277';

    const fetchData = async () => {
        const api = await fetch(`https://pixabay.com/api/?key=${api_key}&q=${query}&page=${pageNumber}&per_page=${limit}`);

        const data = await api.json();
        setImageData(data.hits);
        console.log(data.hits);
    }

    const fetchImageByCategory = async (category) => {
        const api = await fetch(`https://pixabay.com/api/?key=${api_key}&category=${category}&page=${pageNumber}&per_page=${limit}`);

        const data = await api.json();
        setImageData(data.hits);
    };

    useEffect(() => {

        fetchData();

    }, [query, pageNumber]);

    return (
        <PixabayContext.Provider value={{
            imageData,
            fetchImageByCategory,
            setQuery,
            pageNumber,
            setPageNumber
        }}>
            {props.children}
        </PixabayContext.Provider>
    )
}

export default PixabayState;
