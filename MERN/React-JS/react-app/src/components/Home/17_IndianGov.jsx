import React from 'react'
import State from './17_State'

const IndianGov = () => {
  const money = 10000;

  return (
    <div>
      <div>This is IndianGov Component</div>
      <State money={money} />
    </div>
  )
}

export default IndianGov