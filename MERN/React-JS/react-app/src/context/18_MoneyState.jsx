import React, { useState } from 'react'
import MoneyContext from './MoneyContext'

const MoneyState = (props) => {
    const money = 1000;
    const dollar = 90;
    const [counter, setCounter] = useState(0);
    const name = 'John';

    return (
        <MoneyContext.Provider value={{
            money,
            dollar,
            counter,
            setCounter,
            name
        }}>
            {props.children}
        </MoneyContext.Provider>
    );
}

export default MoneyState