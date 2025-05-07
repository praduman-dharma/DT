import React, { useEffect, useState } from 'react'
import './meal.css'

const Meal = () => {
    const [mealData, setMealData] = useState([]);
    const [area, setArea] = useState('indian');
    const [inputData, setInputData] = useState('')

    useEffect(() => {

        const fetchDataFromApi = async () => {
            const api = await fetch(`https://www.themealdb.com/api/json/v1/1/filter.php?a=${area}`);

            const data = await api.json();

            console.log(data.meals);

            if (data.meals) {
                setMealData(data.meals);
            } else {
                setMealData([]);
            }
        }

        fetchDataFromApi();
    }, [area]);

    const submitHandler = async (e) => {
        e.preventDefault();

        const api = await fetch(`https://www.themealdb.com/api/json/v1/1/search.php?s=${inputData}`);

        const data = await api.json();

        console.log("search data" + data.meals);

        if (data.meals) {
            setMealData(data.meals);
        } else {
            setMealData([]);
        }
    }


    return (
        <>
            <div className="py-5 buttons-wrapper">
                <button type="button" className="btn btn-primary" onClick={() => setArea('indian')}>Indian</button>
                <button type="button" className="btn btn-success" onClick={() => setArea('chinese')}>Chinese</button>
                <button type="button" className="btn btn-info" onClick={() => setArea('american')}>American</button>
                <button type="button" className="btn btn-warning" onClick={() => setArea('thai')}>Thai</button>
                <button type="button" className="btn btn-info" onClick={() => setArea('italian')}>Italian</button>
                <button type="button" className="btn btn-light" onClick={() => setArea('russian')}>Russian</button>
            </div>

            <form onSubmit={submitHandler} className="search-bar">
                <input type="text" name="search" id="search" className="search" onChange={(e) => setInputData(e.target.value)} />
            </form>

            <div className='meals-wrapper'>
                {mealData.map((data) => (
                    <div key={data.idMeal} className='meal'>
                        <div>
                            <img src={data.strMealThumb} alt={data.strMeal} style={{
                                borderRadius: '10px',
                                border: '2px solid blue'
                            }} width={220} height={220} />
                        </div>
                        <h5 className='meal-name'>{data.strMeal}</h5>
                    </div>
                ))}
            </div>
        </>
    )
}

export default Meal