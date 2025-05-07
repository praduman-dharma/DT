import React from 'react'
import Person2 from './01_Person2'

const Person = () => {
    const name = "John";
    const age = 20;

    const person = {
        name: "John",
        age: 20,
        email: "john@gmail.com",
        pincode: 388826
    }

    const product = {
        title: "Iphone",
        model: "iphone-15",
        price: 65000
    }

    return (
        <>
            <div>
            {/* <h1>Hellow World!</h1>
            <h2>{name} {age}</h2>
            <h2>Heading 2</h2>
            <h3>Heading 3</h3>
            <h1>2+4</h1>
            <h1>{2+4}</h1> */}
            
            <h1>Name: {person.name}</h1>
            <h1>Age: {person.age}</h1>
            <h1>Email: {person.email}</h1>
            <h1>Pincode: {person.pincode}</h1>
            </div>

            <Person2 />
            
            <div>
                <h1>Name: {product.title}</h1>
                <h1>model: {product.model}</h1>
                <h1>Price: {product.price}</h1>
            </div>
        </>
    )
}

export default Person