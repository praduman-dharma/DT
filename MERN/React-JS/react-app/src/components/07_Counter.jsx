import React, { useState } from 'react'

const Counter = () => {
    let [counter, setCounter] = useState(0);

    const [product, setProduct] = useState("iphone");

    const [arr, setArr] = useState([10, 20, 30]);

    const [obj, setObj] = useState({
      name: "John",
      age: 20,
      salary: 20000
    })

    const increaseBy1 = () => {
        counter++;
        setCounter(counter);
        console.log("counter = ", counter);
    }

    const decreaseBy1 = () => {
        counter--;
        setCounter(counter);
        console.log("counter = ", counter);
    }

  return (
    <div>
        <h1>{obj.name}</h1>
        <h1>{obj.salary}</h1>
        <h1>{counter}</h1>
        <button onClick={increaseBy1}>Increase</button>
        <button onClick={decreaseBy1}>Decrease</button>
    </div>
  )
}

export default Counter