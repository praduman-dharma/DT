import React from 'react'
import './05_laptop.css'

const Laptop = ({brandName, model, price}) => {
    const styleObj = {
        backgroundColor: 'gray',
        padding: '10px 30px', 
        margin: '10px', 
        borderRadius: '5px', 
        border: '2px solid #eee'
    };

  return (
    <div
        // Inline Styling
        // style={{
        //     backgroundColor: 'gray',
        //     padding: '10px 30px', 
        //     margin: '10px', 
        //     borderRadius: '5px', 
        //     border: '2px solid #ccc'
        // }}

        // style={styleObj}

        className='block'
        >
        <h3>Brand Name:{brandName}</h3>
        <h3>Model: {model}</h3>
        <h3>Price: {price}</h3>
    </div>
  )
}

export default Laptop