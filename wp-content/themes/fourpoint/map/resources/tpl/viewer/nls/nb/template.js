﻿define(
	 ({
		viewer: {
			common: {
				close: "Lukk"
			},
			loading: {
				long: "Historien initialiseres",
				long2: "Takk for at du venter",
				failButton: "Last inn historien på nytt"
			},
			signin: {
				title: "Krever godkjenning",
				explainViewer: "Logg på med en konto på %PORTAL_LINK% for å få tilgang til historien.",
				explainBuilder: "Logg på med en konto på %PORTAL_LINK% for å konfigurere historien."
			},
			errors: {
				boxTitle: "Det har oppstått en feil",
				invalidConfig: "Ugyldig konfigurasjon",
				invalidConfigNoApp: "Identifikator for webkartprogram ikke angitt i index.html.",
				invalidConfigNoAppDev: "Det er ikke angitt en webkartapplikasjons-ID i URL-parameterne (?appid=). App-ID-konfigurasjonen i Index.html ignoreres i utviklingsmodus.",
				unspecifiedConfigOwner: "Godkjent eier er ikke konfigurert.",
				invalidConfigOwner: "Historieeier er ikke godkjent.",
				createMap: "Kan ikke opprette kart",
				invalidApp: "%TPL_NAME% finnes ikke eller er ikke tilgjengelig.",
				appLoadingFail: "Noe gikk galt, og %TPL_NAME% ble ikke lastet inn på riktig måte.",
				notConfiguredDesktop: "Historien er ikke konfigurert ennå.",
				notConfiguredMobile: "Byggeverktøyet %TPL_NAME% støttes ikke med denne skjermstørrelsen. Hvis det er mulig, endrer du størrelsen på nettleseren for å få tilgang til byggeverktøyet. Du kan også lage historien på en enhet med større skjerm.",
				notConfiguredMobile2: "Snu enheten i liggende retning for å bruke byggeverktøyet %TPL_NAME%.",
				notAuthorized: "Du har ikke tillatelse til å lese denne historien",
				notAuthorizedBuilder: "Du har ikke tillatelse til å bruke byggeverktøyet %TPL_NAME%.",
				noBuilderIE: "Byggeverktøyet er ikke støttet i Internet Explorer før versjon %VERSION%. %UPGRADE%",
				noViewerIE: "Denne historien er ikke støttet i Internet Explorer før versjon %VERSION%. %UPGRADE%",
				upgradeBrowser: "<a href='http://browsehappy.com/' target='_blank'>Oppdater webleseren</a>.",
				mapLoadingFail: "Noe gikk galt, og kartet ble ikke lastet inn på riktig måte.",
				signOut: "Logg ut"
			},
			mobileInfo: {
				legend: "Tegnforklaring",
				description: "Beskrivelse",
				lblLegendMobileError: "Beklager, tegnforklaringen er ikke tilgjengelig. Last inn historien på nytt.",
				lblLegendMobileErrorExplain: "Tegnforklaringen er ikke tilgjengelig når enheten er rotert til stående modus etter at historien er lastet inn."
			},
			mobileFooter: {
				swipeInvite: "Sveip for å navigere i tegnforklaringen",
				lblNext: "Neste",
				lblEnd: "Du er kommet til slutten av fortellingen"
			},
			headerFromCommon: {
				storymapsText: "Et fortellingskart",
				builderButton: "Rediger",
				facebookTooltip: "Del på Facebook",
				twitterTooltip: "Del på Twitter",
				bitlyTooltip: "Få en kort kobling",
				templateTitle: "Angi tittel på malen",
				templateSubtitle: "Angi undertittel for malen",
				share: "Del",
				checking: "Kontrollerer historieinnholdet",
				fix: "Løs problemer i historien",
				noerrors: "Ingen problemer oppdaget",
				tooltipAutoplayDisabled: "Dette er ikke tilgjengelig i automatisk avspillingsmodus",
				notshared: "Historien er ikke delt"
			},
			overviewFromCommon: {
				title: "Oversiktskart"
			},
			legendFromCommon: {
				title: "Tegnforklaring"
			},
			shareFromCommon: {
				copy: "Kopier",
				copied: "Kopiert",
				open: "Åpne",
				embed: "Bygg inn på webside",
				embedExplain: "Bruk følgende HTML-kode for å bygge inn historien på en webside.",
				size: "Størrelse (bredde/høyde):",
				autoplayLabel: "Automatisk avspillingsmodus",
				autoplayExplain1: "Automatisk avspillingsmodus går videre i historien med gitte intervaller. Dette fungerer utmerket til kiosker eller informasjonsskjermer, men kan i andre situasjoner gjøre det vanskeligere å lese historien. Denne funksjonen støttes ikke på små skjermer.",
				autoplayExplain2: "Når denne modusen er aktivert, vises det kontroller for å spille av/pause historien og justere navigeringshastigheten.",
				linksupdated: "Koblingene ble oppdatert"
			},
			locatorFromCommon: {
				error: "Lokasjon ikke tilgjengelig"
			}
        }
    })
);