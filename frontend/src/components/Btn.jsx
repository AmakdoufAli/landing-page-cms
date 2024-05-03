import React from 'react'

const Btn = () => {
  return (
    <a href="/checkout">
      <div className='bg-greenyellow p-3 border-0 rounded-md shadow-rounded cursor-pointer hover:bg-grouna w-full'>
        <div className="flex justify-center">
          <img src="imgs/flech.png" width={25} height={25} alt="flech" />
          <strong className='text-white'>OUI! JE VEUX <span className='text-red-600'>ACHETER MAINTENANT !</span></strong>
        </div>
        <p className='text-white text-center text-sm'>ET ACCÉDEZ IMMÉDIATEMENT À CETTE MEILLEURE FORMATION!</p>
      </div>
    </a>
  )
}

export default Btn