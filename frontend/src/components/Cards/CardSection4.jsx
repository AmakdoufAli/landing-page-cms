import { S2i1, S2i2, S2i3, S2i4 } from '../../assets/images';
import Point from '../Point';

const CardSection4 = ({card, i18n}) => {

  return (
    <div className={`rounded-md p-1 sr:p-2 sm:p-3 md:p-4 lg:p-9 ${card.card_order === 1 ? 'bg-pink-1' : (card.card_order === 2 ? 'bg-blue-2' : (card.card_order === 3 ? 'bg-orange-1' : 'bg-purpal-1')) }`}>
        <div className="flex items-center gap-2">
            <div className="">
                <img src={card.card_order === 1 ? S2i1 : (card.card_order === 2 ? S2i2 : (card.card_order === 3 ? S2i3 : S2i4))} alt="s2i1" className='min-w-10 max-w-10 sr:min-w-12 sr:max-w-min-w-12 sm:min-w-max-w-14 sm:max-w-14' />
            </div>
            <div className="">
                <h4 className='font-bold text-gray-1 text-sm sr:text-16 sm:text-lg'>{card.title[i18n.language]}</h4>
            </div>
        </div>
        <div className="pt-3 flex flex-col gap-2">
            {card.description[i18n.language].split('\n').map((point, index) => (
                <Point key={index} point={point} />
            ))}
        </div>
    </div>
  )
}

export default CardSection4