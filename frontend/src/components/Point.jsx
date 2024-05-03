import React from 'react'

const Point = ({point}) => {
  return (
    <div className="flex items-center gap-2">
      <div className="">
          <img src="icons/play.webp" alt="icon" className='rounded-full min-w-5 max-w-5 sr:min-w-5 sr:max-w-5' />
      </div>
      <div className="">
          <p className='text-xs sr:text-sm sm:text md:text-sm '>{point}</p>
      </div>
    </div>
  )
}

export default Point