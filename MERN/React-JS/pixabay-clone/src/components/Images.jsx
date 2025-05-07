import React, { useContext } from 'react'
import PixabayContext from '../context/PixabayContext'

const Images = () => {
    const { imageData, pageNumber, setPageNumber } = useContext(PixabayContext);
    return (
        <div className="container">
            <div className="items-wrapper">
                {imageData.map((image) => (
                    <div key={image.id} className="item">
                        <a href={image.largeImageURL}>
                            <img src={image.largeImageURL} alt="" data-page-url={image.pageURL} />
                        </a>
                        {/* <img src={image.largeImageURL} height="280" alt="" /> */}
                        {/* <img src={image.previewURL} height="100" alt="" /> */}
                    </div>
                ))}
            </div>

            <nav className="page navigation">
                <ul className="pagination">
                    <li className="page-item">
                        <button onClick={() => setPageNumber(parseInt(pageNumber) - 1)}  className="page-link">Previous</button>
                    </li>
                    <li className="page-item">
                        <input type="text" className="page-link number" value={pageNumber} onChange={(e) => setPageNumber(e.target.value)} />
                    </li>
                    <li className="page-item">
                        <button onClick={() => setPageNumber(parseInt(pageNumber) + 1)}  className="page-link">Next</button>
                    </li>
                </ul>
            </nav>
        </div>
    )
}

export default Images