import React, { useContext } from 'react'
import MoneyContext from '../../context/18_MoneyContext'

const District = () => {
  // console.log(useContext(MoneyContext));
  const data = useContext(MoneyContext);

  return (
    <div>
      <div>This is District Component</div>
      <h3>Money: {data.money}</h3>
      <h3>Dollar: {data.dollar}</h3>
      <h3>Name: {data.name}</h3>
      <h3>Counter: {data.counter}</h3>
      <button onClick={() => data.setCounter(data.counter + 1)}>Increase</button>
    </div>
  )
}

export default District