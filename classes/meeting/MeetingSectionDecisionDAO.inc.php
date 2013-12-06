<?php

/**
 * Last update on February 2013
 * EL
**/

import('classes.meeting.MeetingSectionDecision');

class MeetingSectionDecisionDAO extends DAO {

	
	function MeetingSectionDecisionDAO() {
		parent::DAO();
	}
	
	/**
	 * Get MeetingSectionDecision object
	 * @param $meetingId int
	 * @return array
	 */
	function &getMeetingSectionDecisionsByMeetingId($meetingId) {
		$meetingSectionDecisions = array();
		$result =& $this->retrieve(
			'SELECT meeting_id, section_decision_id FROM meeting_section_decisions WHERE meeting_id = ?',
			(int) $meetingId
		);
		
		while (!$result->EOF) {
			$meetingSectionDecisions[] =& $this->_returnMeetingSectionDecisionFromRow($result->GetRowAssoc(false));
			$result->MoveNext();
		}
		
		
		$result->Close();
		unset($result);

		return $meetingSectionDecisions;
	}
        
        /*
	 * Delete all submissions in a meeting
	 */

	function deleteMeetingSectionDecisionsByMeetingId($meetingId){
		return $this->update(
			'DELETE FROM meeting_section_decisions WHERE meeting_id = ?',
			(int) $meetingId
		);
	}

	/**
	 * Return the section decision
	 * Internal function to return an meeting object from a row. Simplified
	 * not to include object settings.
	 * @param $row array
	 * @return section_decision_id
	 */
	function &_returnMeetingSectionDecisionFromRow(&$row) {
		return $row['section_decision_id'];
	}
	
	/**
	 * Get a new data object
	 * @return DataObject
	 */
	function newDataObject() {
		assert(false); // Should be overridden by child classes
	}
	
	/** 
	 * Insert new section decision for the meeting discussion
	 * Insert a new data object
	 * @param int $meetingId
	 * @param int $SubmissionId
	 */
	function insertMeetingSectionDecision($meetingId, $decisionId) {
		$this->update (
			'INSERT INTO meeting_section_decisions
			(meeting_id, section_decision_id)
			VALUES (?, ?)',
			array($meetingId, $decisionId)
		);
	}
	
	/**
	 * Remove section decision from meeting discussion
	 * Update a data object
	 * @param int $meetingId 
	 * @param int $submissionId
	 */
	function deleteMeetingSectionDecision($meetingId, $decisionId) {
		return $this->update(
			'DELETE FROM meeting_section_decisions WHERE meeting_id = ? AND section_decision_id = ?',
			array(
			$meetingId,
			$decisionId)
		);
	}
	
}
