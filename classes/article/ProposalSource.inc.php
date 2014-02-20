<?php

/**
 * @file classes/article/ProposalSource.inc.php
 *
 * @class ProposalSource
 * @ingroup article
 * @see ProposalSourceDAO
 *
 * @brief Source of monetary and material support of a proposal.
 */


class ProposalSource extends DataObject {
    
	/**
	 * Constructor.
	 */
	function ProposalSource() {
            
	}

	//
	// Get/set methods
	//

	/**
	 * Get source id.
	 * @return int
	 */
	function getSourceId() {
		return $this->getData('sourceId');
	} 

	/**
	 * Set source id.
	 * @param $sourceId int
	 */
	function setSourceId($sourceId) {
		return $this->setData('sourceId', $sourceId);
	}

        
        /**
	 * Get article id.
	 * @return int
	 */
	function getArticleId() {
		return $this->getData('articleId');
	}

	/**
	 * Set article id.
	 * @param $articleId int
	 */
	function setArticleId($articleId) {
		return $this->setData('articleId', $articleId);
	}

        /**
	 * Get institution ID.
	 * @return int
	 */
	function getInstitutionId() {
		return $this->getData('institutionId');
	}

	/**
	 * Set institution ID.
	 * @param $institutionId int
	 */
	function setInstitutionId($institutionId) {
		return $this->setData('institutionId', $institutionId);
	}

        
        /**
	 * Get source amount.
	 * @return int
	 */
	function getSourceAmount() {
		return $this->getData('sourceAmount');
	}

	/**
	 * Set source amount.
	 * @param $sourceAmount int
	 */
	function setSourceAmount($sourceAmount) {
		return $this->setData('sourceAmount', $sourceAmount);
	}
}

?>
