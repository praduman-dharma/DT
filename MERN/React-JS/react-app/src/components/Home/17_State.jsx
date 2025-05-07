import React from 'react'
import District from './18_District'

const State = ({money}) => {
  return (
    <div>
        <div>This is State Component</div>
        <District money={money} />
    </div>
  )
}

export default State