
const CardSection5 = ({card, i18n}) => {
  return (
    card.description[i18n.language].split('\n').map((point, index) => (
      <div className="flex items-center gap-2" key={index}>
        <div className="">
          <img src="icons/checkmark.jpg" alt="" className='min-w-5 max-w-5 rounded-full' />
        </div>
        <div className="">
          <p className='font-semibold text-xs'>{point}</p>
        </div>
      </div>
    ))
  )
}

export default CardSection5