import React, { useContext } from 'react'
import PixabayContext from '../context/PixabayContext'

const Navbar = () => {
    const { fetchImageByCategory, setQuery } = useContext(PixabayContext);

    return (
        <>
            <div className="py-5 buttons-wrapper">
                <button type="button" className="btn btn-outline-primary" onClick={() => fetchImageByCategory('nature')}>Nature</button>
                <button type="button" className="btn btn-outline-success" onClick={() => fetchImageByCategory('science')}>Science</button>
                <button type="button" className="btn btn-outline-info" onClick={() => fetchImageByCategory('computer')}>Computer</button>
                <button type="button" className="btn btn-outline-warning" onClick={() => fetchImageByCategory('buildings')}>Buildings</button>
                <button type="button" className="btn btn-outline-info" onClick={() => fetchImageByCategory('sports')}>Sports</button>
                <button type="button" className="btn btn-outline-success" onClick={() => fetchImageByCategory('travel')}>Travel</button>
                <button type="button" className="btn btn-outline-light" onClick={() => fetchImageByCategory('food')}>Food</button>
            </div>

            <form className="search-bar">
                <input type="text" name="search" id="search" className="search form-control bg-dark text-light" onChange={(e) => setQuery(e.target.value)} />
            </form>
        </>
    )
}

export default Navbar