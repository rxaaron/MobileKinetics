function RoundToSignificance(NumberToRound,Increment){
    var x = NumberToRound / Increment;
    var y = Math.round(x);
    return y * Increment;
};

function InchesToMeters(Inches){
    return (Inches * 0.0254);
};

function PoundsToKilograms(Pounds){
    return (Pounds / 2.2);
};

function HalfLife(k){
    return 0.693 / k;
};

function GentamicinEstK(CrCl){
    return ((0.00293 * CrCl) + 0.014);
};

function TobramycinEstK(CrClStd){
    return ((0.00293 * CrClStd) + 0.014);
};

function VancomycinEstK(CrCl){
    return ((0.00083 * CrCl) + 0.004);
};

function EstVolumeOfDistribution(PopulationConstant,PtWeightInKg){
    return PopulationConstant * PtWeightInKg;
};

function BodySurfaceArea(ActualBodyWeight,PtHeightInInches){
    return Math.sqrt((ActualBodyWeight * (2.54 * PtHeightInInches)) / 3600);
};

function BodyMassIndex(ActualBodyWeight,HeightInInches){
    var heightm = InchesToMeters(HeightInInches);
    return ((ActualBodyWeight)/(Math.pow(heightm,2)));
};

function DosingWeight(PtHeightInInches,ActualBodyWeight,IsFemale){
    if(IsFemale!=="1"){
        if(PtHeightInInches>60){
            //Standard IBW equation
            var IBW = (50 + (2.3 * (PtHeightInInches - 60)));
            //Check for >20% of IBW
            if((ActualBodyWeight)>(1.2 * IBW)){
                return (IBW + (0.4 * (ActualBodyWeight - IBW)));
            }else if(ActualBodyWeight<IBW){
                return ActualBodyWeight;
            }else{
                return IBW;
            }
        }else{
            //Lean Body Weight (LBW2005)
            var BMI = BodyMassIndex(ActualBodyWeight,PtHeightInInches);
            return ((9.27 * Math.pow(10,3) * ActualBodyWeight)/(6.68 * Math.pow(10,3) + (216 * BMI)));
        }
    }else{
        if(PtHeightInInches>60){
            //Standard IBW equation
            var IBW = (45.5 + (2.3 * (PtHeightInInches - 60)));
            //Check for >20% of IBW
            if((ActualBodyWeight)>(1.2 * IBW)){
                return (IBW + (0.4 * (ActualBodyWeight - IBW)));
            }else if(ActualBodyWeight<IBW){
                return ActualBodyWeight;
            }else{
                return IBW;
            }
        }else{
            //Lean Body Weight (LBW2005)
            var BMI = BodyMassIndex(ActualBodyWeight,PtHeightInInches);
            return ((9.27 * Math.pow(10,3) * ActualBodyWeight)/(8.78 * Math.pow(10,3) + (244 * BMI)));
        }
    }
};

function IDMSCorrection(SCr){
    return ((SCr * 1.065) + 0.067);
};

function CCG(Age,DosingWeight,SCr,IsFemale){
    if(IsFemale!==1){
        return (((140 - Age) * DosingWeight)/(72 * SCr));
    }else{
        return ((((140 - Age) * DosingWeight)/(72 * SCr)) * 0.85);
    }
};

function StandardizedCrCl(CrCl,BSA){
    return (CrCl * (1.73 / BSA));
};

function AgExtIntDose(DosingWeight){
    //Per Antimicrobial Agents and Chemotherapy, Mar. 1995 (Hartford Nomogram)
    return (DosingWeight * 7);
};

function AgExtIntInitialInterval(CrCl){
    //Per Antimicrobial Agents and Chemotherapy, Mar. 1995 (Hartford Nomogram)
    var frequency;
    if(CrCl > 59){
        frequency = 24;
    }else if(60 > CrCl && CrCl > 39){
        frequency = 36;
    }else if(40 > CrCl && CrCl >19){
        frequency = 48;
    }else{
        frequency = 0;
    }
    return frequency;
};

function AgExtIntNomogram(RandomLevel,HoursAfterInfusion){
    //Per Antimicrobial Agents and Chemotherapy, Mar. 1995 (Hartford Nomogram)
    //These variables store the Y coordiante for the cutoff lines on the nomogram, where HoursAfterInfusion is the X coordinate.
    var h24point = (-0.75 * HoursAfterInfusion) + 12.25;
    var h36point = (-1 * HoursAfterInfusion) + 17;
    var h48point = (-1 * HoursAfterInfusion) + 19;
    var newFrequency;
    if(RandomLevel<h24point){
        newFrequency = 24;
    }else if(h24point<=RandomLevel && RandomLevel<h36point){
        newFrequency=36;
    }else if(h36point<=RandomLevel && RandomLevel<h48point){
        newFrequency = 48;
    }else{
        newFrequency = 0;
    }
    return newFrequency;
};

function CalculateInterval(DesiredTrough,DesiredPeak,K,TimeToPeak){
    return (((Math.log((DesiredTrough / DesiredPeak)))/(-1 * K)) + TimeToPeak);
};

function CalculateDose(DesiredPeak, VolumeOfDistribution,K,DoseInterval,TimeOfInfusion,TimeToPeak){
    return ((DesiredPeak * VolumeOfDistribution * K *(1 - (Math.exp(-1 * K * DoseInterval))) * TimeOfInfusion) / ((1 - (Math.exp(-1 * K * TimeOfInfusion))) * Math.exp(-1 * K * TimeToPeak)));
};

function PredictPeak(Dose,TimeOfInfusion,K,TimeToPeak,VolumeOfDistribution,DoseInterval){
    return (((Dose / TimeOfInfusion) * (1 - (Math.exp(-1 * K * TimeOfInfusion))) * (Math.exp(-1 * K * TimeToPeak))) / (VolumeOfDistribution * K * (1 - (Math.exp(-1 * K * DoseInterval)))));
};

function PredictTrough(PredictedPeak,K,DoseInterval,TimeToPeak){
    return (PredictedPeak * (Math.exp(-1 * K * (DoseInterval - TimeToPeak))));
};

function PatientK2Level(Peak,Trough,Interval,TimeToPeak,TimeToTrough){
    return ((Math.log(Peak / Trough)) / (Interval - TimeToPeak - TimeToTrough));
};

function PatientK1Level(VolumeOfDistribution,Dose,Trough,Interval){
    return ((Math.log((Dose / VolumeOfDistribution) + Trough) / Trough) / Interval);
};

function ActualVolumeOfDistribution(Dose,TimeOfInfusion,ActualK,TimeToPeak,Peak,Interval){
    return (((Dose / TimeOfInfusion) * (1 - (Math.exp(-1 * ActualK * TimeOfInfusion))) * (Math.exp(-1 * ActualK * (TimeToPeak - TimeOfInfusion)))) / (Peak * ActualK * (1 - (Math.exp(-1 * ActualK * Interval)))));
};

function CalculateAge(DateOfBirth){
    if(DateOfBirth===''){
        return 0;
    }
    var todayDate = new Date();
    var todayYear = todayDate.getFullYear();
    var todayMonth = todayDate.getMonth();
    var todayDay = todayDate.getDay();
    var birthDate = new Date(DateOfBirth);
    var birthYear = birthDate.getFullYear();
    var birthMonth = birthDate.getMonth();
    var birthDay = birthDate.getDay();
    var age = todayYear - birthYear;
    
    if(todayMonth < birthMonth){
        age--;
    }
    if(birthMonth===todayMonth && todayDay < birthDay){
        age--;
    }
    
    return age;
};