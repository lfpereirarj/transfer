import React, { Component } from 'react';
import DatePicker from 'react-datepicker';
import ptBr from 'date-fns/locale/pt-BR';
registerLocale('pt-BR', ptBr);

import "react-datepicker/dist/react-datepicker.css";
import './schedule.scss';

export default class Schedule extends Component {

    state = {
        startDate: null
    }

    componentDidMount(){
        const date = new Date();
        this.setState({startDate: date.now})
    }

    render() {
        
        return (
            <div className="schedule">
                <div className="schedule__box">
                    <div className="schedule__header">
                        <div className="schedule__title">
                            <i className="fi fi-bus"></i>
                            <span>Agendar Transfer</span>
                        </div>
                        <div className="schedule__field">
                            <label className="schedule__label">
                                Translado de
                            </label>
                            <input type="text" className="schedule__input" placeholder="Digite a origem" />
                        </div>
                        <div className="schedule__field">
                            <label className="schedule__label">
                                Para
                            </label>
                            <input type="text" className="schedule__input" placeholder="Digite o destino" />
                        </div>
                        <div className="schedule__choiche">
                            <div className="schedule__radio">
                                <input type="radio"  id="ida-e-volta" name="package"/>
                                <label className="schedule__label" for="ida-e-volta">
                                    <span className="schedule__label-bullet"></span>
                                    ida e volta
                                </label>
                                
                            </div>
                            <div className="schedule__radio">
                                <input type="radio"  id="ida-ou-volta"  name="package"/>
                                <label className="schedule__label" for="ida-ou-volta">
                                    <span className="schedule__label-bullet"></span>
                                ida ou volta
                                </label>
                            </div>
                        </div>
                        
                    </div>
                    <div className="schedule__date">
                        <div className="schedule__field">
                            <label className="schedule__label">
                                Ida
                            </label>
                            <DatePicker
                                selected={this.state.startDate}
                                locale="pt-BR"
                            />
                        </div>
                        <div className="schedule__field">
                            <label className="schedule__label">
                                Volta
                            </label>
                            <DatePicker
                                selected={this.state.startDate}
                            />
                        </div>
                        <div className="schedule__field">
                            <label className="schedule__label">
                                Volta
                            </label>
                            <input type="text" className="schedule__input" placeholder="Digite o número de pessoas" />
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}
