import { S1i1, S1i2, S1i3 } from "../../assets/images";


const CardSection2 = ({card, i18n}) => {

  return (
    <div className="rounded-xl shadow-tr flex flex-col items-center justify-center gap-4 text-center p-5">
        <div className="">
            <img src={card.card_order === 1 ? S1i1 : (card.card_order === 2 ? S1i2 : S1i3) } alt={card.title.fr} className='mx-auto w-20 sr:w-28'/>
        </div>
        <div className="">
            <h3 className='text-gray-1 font-semibold text-xl sr:text-2xl'>{card.title[i18n.language]}</h3>
        </div>
        <div>
            <p className='text-gray-1 text-xs sr:text-16'>{card.description[i18n.language]}</p>
        </div>
    </div>
  )
}

export default CardSection2