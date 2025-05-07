import React from 'react'

const Person4 = ({name, age, panCard, price}) => {
  return (
    <div>
        <h1>Name: {name}</h1>
        <h2>
            {age >= 18 ? 'You can drive' : 'You can not drive' } 
        </h2>
        {age >= 18 ? <h2>You can drive</h2> : <h2>You can not drive</h2>}
        <h3>{panCard == true ? 'You can open Bank Account in our Bank' : ''}</h3>
        <h3>{panCard ? 'You can open Bank Account in our Bank' : ''}</h3>
        <div>{panCard && <p>You can open Bank Account in our Bank.</p>}</div>
        <div>{(price == 100) && <p>You can purchase an Iphone.</p>}</div>
    </div>
  )
}

export default Person4