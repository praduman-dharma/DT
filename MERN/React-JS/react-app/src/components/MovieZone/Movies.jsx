import React, { useState } from 'react'
import { movies } from './data.js'

const Movies = () => {
    const [movieList, setMovieList] = useState(movies);

    const filterByCategory = (movieType) => {
        if (movieType == "All") {
            setMovieList(movies);
        } else {
            setMovieList(movies.filter((data) => data.category == movieType));
        }
    }

    return (
        <>
            <div className="py-5 buttons-wrapper">
                {/* <button type="button" className="btn btn-primary" onClick={() => filterByCategory('All')}>All</button> */}
                <button type="button" className="btn btn-primary" onClick={() => setMovieList(movies)}>All</button>
                <button type="button" className="btn btn-primary" onClick={() => filterByCategory('Action')}>Action</button>
                <button type="button" className="btn btn-success" onClick={() => filterByCategory('Thriller')}>Thriller</button>
                <button type="button" className="btn btn-info" onClick={() => filterByCategory('Animation')}>Animation</button>
                <button type="button" className="btn btn-warning" onClick={() => filterByCategory('Horror')}>Horror</button>
                <button type="button" className="btn btn-info" onClick={() => filterByCategory('Drama')}>Drama</button>
                <button type="button" className="btn btn-light" onClick={() => filterByCategory('Sci-Fi')}>Sci - Fi</button>
            </div>

            <div style={{
                display: "flex",
                justifyContent: "center",
                alignItems: "center",
                flexWrap: "wrap",
                textAlign: "center",
                margin: "auto"
            }}>
                {movieList.map((data) => (
                    <div key={data.id} style={{ maxWidth: "280px" }}>
                        <div style={{ padding: "10px" }} className="hover_effect">
                            <img src={data.poster_path} alt={data.title} style={{
                                width: "200px", height: "280px", borderRadius: "10px", border: "1px solid yellow"
                            }} />
                        </div>
                        <h5>{data.title}</h5>
                        <p>{data.release_date}</p>
                    </div>
                ))}
            </div>
        </>
    )
}

export default Movies